<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function connexion_index()
    {
        return view('connexion');
    }

    public function connexion_store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // Auth::attempt utilise le guard "web" : il vérifie le mot de passe haché (bcrypt)
        if (Auth::attempt($credentials, $request->boolean('souvenir'))) {

            // nouvel identifiant de session pour éviter la fixation de session (le panier est conservé)
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin'));
            }

            // intended : renvoie vers la page demandée avant la connexion (ex : valider la commande)
            return redirect()->intended(route('welcome_index'));
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->onlyInput('email');
    }

    public function deconnexion(Request $request): RedirectResponse
    {
        Auth::logout();

        // on vide la session (et donc le panier) et on régénère le jeton CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome_index')->with('status', 'Déconnexion réussie');
    }

    public function supprimer_compte(Request $request): RedirectResponse
    {
        $user = Auth::user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // les commandes de l'utilisateur sont supprimées en cascade (clé étrangère)
        $user->delete();

        return redirect()->route('welcome_index')->with('status', 'Compte supprimé');
    }
}
