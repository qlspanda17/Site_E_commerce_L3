<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InscriptionController extends Controller
{
    public function inscription_index()
    {
        return view('inscription');
    }

    public function inscription_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'conditions' => 'accepted'
        ], [
            'conditions.accepted' => 'Veuillez accepter les termes et services'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect()->route('connexion_index')->with('success', 'Compte créé, vous pouvez vous connecter');
    }
}
