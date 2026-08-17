<?php
namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Übergibt eine Kontaktanfrage zusätzlich zum Mailversand als Interessenten-Lead
 * an Melon (external-data-hook, POST JSON mit Basic Auth).
 *
 * Der Hook ist bewusst "best effort": Fehler werden geloggt, aber nie an die
 * Besucherin durchgereicht – eine Störung bei Melon darf das Formular nicht
 * blockieren, die Anfrage ist über die Mails ohnehin zugestellt.
 */
class SendLeadToMelon
{
  public function execute(array $data): bool
  {
    if (! config('melon.hook.enabled')) {
      return false;
    }

    $url = config('melon.hook.url');

    if (blank($url)) {
      Log::warning('Melon-Hook ist aktiviert, aber MELON_HOOK_URL fehlt.');

      return false;
    }

    try {
      $response = Http::withBasicAuth(
          (string) config('melon.hook.username'),
          (string) config('melon.hook.password')
        )
        ->timeout((int) config('melon.hook.timeout'))
        ->acceptJson()
        ->asJson()
        ->post($url, $this->payload($data));

      if ($response->failed()) {
        Log::warning('Melon-Hook abgelehnt.', [
          'status' => $response->status(),
          'body' => \Illuminate\Support\Str::limit($response->body(), 500),
        ]);

        return false;
      }

      return true;
    }
    catch (\Throwable $e) {
      Log::warning('Melon-Hook nicht erreichbar.', ['message' => $e->getMessage()]);

      return false;
    }
  }

  /**
   * Feldnamen gemäss "API – Schnittstelle Interessentenformular" von Melon.
   */
  private function payload(array $data): array
  {
    [$postcode, $city] = $this->splitLocation($data['location'] ?? '');

    return array_filter([
      'firstname' => $data['firstname'] ?? null,
      'name' => $data['name'] ?? null,
      'street_nr' => $data['street_number'] ?? null,
      'postcode' => $postcode,
      'city' => $city,
      'email' => $data['email'] ?? null,
      'phone' => $data['phone'] ?? null,
      'remarks' => $data['message'] ?? null,
      'howfound' => 'project_website',
    ], fn ($value) => filled($value));
  }

  /**
   * Das Formular erfasst "PLZ/Ort" in einem Feld; Melon erwartet beides getrennt.
   * Ohne führende Postleitzahl wandert der ganze Wert in `city`.
   */
  private function splitLocation(string $location): array
  {
    if (preg_match('/^\s*(\d{4,6})\s+(.+)$/u', $location, $matches)) {
      return [(int) $matches[1], trim($matches[2])];
    }

    return [null, trim($location) ?: null];
  }
}
