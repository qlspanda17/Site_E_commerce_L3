<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class UtilisateurController extends Controller
{
    public function liste()
    {
        $utilisateurs = User::orderBy('name')->get();

        return view('admin.utilisateurs.liste', [
            'utilisateurs' => $utilisateurs
        ]);
    }

    public function creer()
    {
        return view('admin.utilisateurs.creer');
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin_utilisateur_liste')->with('success', 'Utilisateur créé');
    }

    public function modifier($id)
    {
        $utilisateur = User::findOrFail($id);

        return view('admin.utilisateurs.modifier', [
            'utilisateur' => $utilisateur
        ]);
    }

    public function mettre_a_jour(Request $request, $id)
    {
        $utilisateur = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            // l'email doit rester unique, sauf pour l'utilisateur lui-même
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($utilisateur->id)],
            // le mot de passe est facultatif : vide = on ne le change pas
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:user,admin'
        ]);

        // un admin ne peut pas se retirer lui-même les droits (sinon il perd l'accès)
        if ($utilisateur->id == Auth::id() && $request->role != 'admin') {
            return back()->with('error', 'Vous ne pouvez pas retirer votre propre rôle administrateur')->withInput();
        }

        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->role = $request->role;

        if ($request->filled('password')) {
            $utilisateur->password = Hash::make($request->password);
        }

        $utilisateur->save();

        return redirect()->route('admin_utilisateur_liste')->with('success', 'Utilisateur modifié');
    }

    public function supprimer($id)
    {
        $utilisateur = User::findOrFail($id);

        if ($utilisateur->id == Auth::id()) {
            return redirect()->route('admin_utilisateur_liste')->with('error', 'Vous ne pouvez pas supprimer votre propre compte ici');
        }

        $utilisateur->delete();

        return redirect()->route('admin_utilisateur_liste')->with('success', 'Utilisateur supprimé');
    }
}
