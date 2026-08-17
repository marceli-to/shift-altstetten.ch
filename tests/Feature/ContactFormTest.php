<?php

use App\Mail\ContactOwnerMail;
use App\Mail\ContactUserMail;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

function contactPayload(array $overrides = []): array
{
  return array_merge([
    'firstname' => 'Anna',
    'name' => 'Muster',
    'street_number' => 'Badenerstrasse 587',
    'location' => '8048 Zürich',
    'email' => 'anna@example.com',
    'phone' => '+41 44 123 45 67',
    'message' => 'Interesse an einem Kleinbüro.',
    'privacy' => '1',
  ], $overrides);
}

function enableMelonHook(): void
{
  config([
    'melon.hook.enabled' => true,
    'melon.hook.url' => 'https://shift.api.melon.market/de/external-data-hook',
    'melon.hook.username' => 'immoserver',
    'melon.hook.password' => 'geheim',
  ]);
}

it('sends both mails and redirects on success', function () {
  Mail::fake();
  Http::fake();

  $this->post(route('contact.send'), contactPayload())
    ->assertRedirect(route('page.contact') . '#formular')
    ->assertSessionHas('success');

  Mail::assertSent(ContactOwnerMail::class);
  Mail::assertSent(ContactUserMail::class);
});

it('does not call the melon hook while it is disabled', function () {
  Mail::fake();
  Http::fake();

  config(['melon.hook.enabled' => false]);

  $this->post(route('contact.send'), contactPayload());

  Http::assertNothingSent();
});

it('posts the lead to melon using the documented field names', function () {
  Mail::fake();
  Http::fake(['*' => Http::response([], 200)]);
  enableMelonHook();

  $this->post(route('contact.send'), contactPayload());

  Http::assertSent(function ($request) {
    expect($request->url())->toBe('https://shift.api.melon.market/de/external-data-hook');
    expect($request->hasHeader('Authorization', 'Basic ' . base64_encode('immoserver:geheim')))->toBeTrue();
    expect($request->data())->toBe([
      'firstname' => 'Anna',
      'name' => 'Muster',
      'street_nr' => 'Badenerstrasse 587',
      // "PLZ/Ort" wird aus dem einen Formularfeld aufgeteilt.
      'postcode' => 8048,
      'city' => 'Zürich',
      'email' => 'anna@example.com',
      'phone' => '+41 44 123 45 67',
      'remarks' => 'Interesse an einem Kleinbüro.',
      'howfound' => 'project_website',
    ]);

    return true;
  });
});

it('keeps the whole value as city when no postcode is given', function () {
  Mail::fake();
  Http::fake(['*' => Http::response([], 200)]);
  enableMelonHook();

  $this->post(route('contact.send'), contactPayload(['location' => 'Zürich']));

  Http::assertSent(function ($request) {
    expect($request->data())->not->toHaveKey('postcode');
    expect($request->data()['city'])->toBe('Zürich');

    return true;
  });
});

it('still confirms the enquiry when melon is unreachable', function () {
  Mail::fake();
  Http::fake(fn () => throw new ConnectionException('timeout'));
  enableMelonHook();

  $this->post(route('contact.send'), contactPayload())
    ->assertRedirect(route('page.contact') . '#formular')
    ->assertSessionHas('success');

  Mail::assertSent(ContactOwnerMail::class);
});

it('silently accepts honeypot submissions without sending anything', function () {
  Mail::fake();
  Http::fake();
  enableMelonHook();

  $this->post(route('contact.send'), contactPayload(['webs1te' => 'https://spam.example']))
    ->assertSessionHas('success');

  Mail::assertNothingSent();
  Http::assertNothingSent();
});
