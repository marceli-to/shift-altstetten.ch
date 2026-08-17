<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  public function show()
  {
    return view('admin.login');
  }

  public function store(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'string'],
    ], [
      'required' => 'Dieses Feld ist erforderlich.',
      'email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
    ]);

    if (! Auth::attempt($credentials, $request->boolean('remember'))) {
      throw ValidationException::withMessages([
        'email' => 'Diese Zugangsdaten sind uns nicht bekannt.',
      ]);
    }

    $request->session()->regenerate();

    return redirect()->intended(route('admin.objects.index'));
  }

  public function destroy(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }
}
