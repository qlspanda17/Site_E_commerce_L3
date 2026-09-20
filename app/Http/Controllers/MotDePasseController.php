<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class MotDePasseController extends Controller
{
    public function index()
    {
        return view('mot_de_passe_oublie');
    }

    public function envoyer(Request $request)
    {
        Password::sendResetLink($request->only('email'));

        return back()->with('success', 'Un email de réinitialisation a été envoyé.');
    }

    public function reset(string $token)
    {
        return view('reinitialiser_mot_de_passe', [
            'token' => $token,
            'email' => request('email'),
        ]);
    }

    public function maj_mot_de_passe(Request $request)
    {
        Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return redirect()->route('connexion_index')->with('success', 'Mot de passe changé.');
    }
}