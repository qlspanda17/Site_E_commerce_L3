<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class MotDePasseController extends Controller
{
    public function index()
    {
        return view('mot_de_passe_oublie');
    }

    public function envoyer(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $statut = Password::sendResetLink($request->only('email'));

        if ($statut == Password::RESET_THROTTLED) {
            return back()->withErrors(['email' => 'Veuillez patienter avant de redemander un lien.'])->onlyInput('email');
        }

        // même message que l'email existe ou non : on ne révèle pas quels comptes existent
        return back()->with('success', 'Si un compte existe avec cette adresse, un email de réinitialisation vient d\'être envoyé.');
    }

    public function reset(Request $request, string $token)
    {
        return view('reinitialiser_mot_de_passe', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function maj_mot_de_passe(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $statut = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($statut != Password::PASSWORD_RESET) {
            return back()->withErrors(['email' => 'Ce lien est invalide ou a expiré.'])->onlyInput('email');
        }

        return redirect()->route('connexion_index')->with('success', 'Mot de passe changé, vous pouvez vous connecter.');
    }
}
