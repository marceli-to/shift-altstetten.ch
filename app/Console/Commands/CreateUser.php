<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

/**
 * Legt einen Zugang für die Gewerbeverwaltung unter /admin an. Bewusst als
 * Kommando statt als Seeder, damit im Repository kein Standardpasswort steht.
 */
class CreateUser extends Command
{
  protected $signature = 'shift:user
                          {--name= : Name der Person}
                          {--email= : E-Mail-Adresse (Login)}';

  protected $description = 'Zugang für die Gewerbeverwaltung (/admin) anlegen oder Passwort zurücksetzen';

  public function handle(): int
  {
    $name = $this->option('name') ?: $this->ask('Name');
    $email = $this->option('email') ?: $this->ask('E-Mail');
    $password = $this->secret('Passwort (min. 8 Zeichen)');

    $validator = Validator::make(
      compact('name', 'email', 'password'),
      [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', Password::min(8)],
      ]
    );

    if ($validator->fails()) {
      foreach ($validator->errors()->all() as $error) {
        $this->error($error);
      }

      return self::FAILURE;
    }

    $user = User::updateOrCreate(
      ['email' => $email],
      ['name' => $name, 'password' => Hash::make($password)]
    );

    $this->info(
      $user->wasRecentlyCreated
        ? "Zugang angelegt: {$user->email}"
        : "Passwort aktualisiert: {$user->email}"
    );

    return self::SUCCESS;
  }
}
