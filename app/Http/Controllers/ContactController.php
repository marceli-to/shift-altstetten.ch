<?php
namespace App\Http\Controllers;

use App\Actions\SendLeadToMelon;
use App\Mail\ContactOwnerMail;
use App\Mail\ContactUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  // Recipients for contact enquiries.
  private const RECIPIENTS = [
    'friedli@cavegn-immobilien.ch',
    'shift@cavegn-immobilien.ch',
  ];

  public function send(Request $request)
  {
    // Honeypot: bots fill the hidden "webs1te" field. Pretend success, send nothing.
    if ($request->filled('webs1te')) {
      return $this->success();
    }

    $data = $request->validate([
      'firstname' => ['required', 'string', 'max:255'],
      'name' => ['required', 'string', 'max:255'],
      'street_number' => ['required', 'string', 'max:255'],
      'location' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'phone' => ['required', 'string', 'max:255'],
      'message' => ['nullable', 'string', 'max:5000'],
      'privacy' => ['accepted'],
    ], [
      'required' => 'Dieses Feld ist erforderlich.',
      'email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
      'privacy.accepted' => 'Bitte akzeptieren Sie die Datenschutzerklärung.',
    ]);

    Mail::to(self::RECIPIENTS)->send(new ContactOwnerMail($data));
    Mail::to($data['email'])->send(new ContactUserMail($data));

    // Zusätzlich als Interessenten-Lead an Melon; schlägt der Hook fehl, wird
    // das nur geloggt (siehe SendLeadToMelon).
    (new SendLeadToMelon)->execute($data);

    return $this->success();
  }

  private function success()
  {
    return redirect()
      ->route('page.contact')
      ->withFragment('formular')
      ->with('success', true);
  }
}
