<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    private function regles(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ];
    }

    public function liste()
    {
        $categories = Categorie::withCount('products')->orderBy('nom')->get();

        return view('admin.categories.liste', [
            'categories' => $categories
        ]);
    }

    public function creer()
    {
        return view('admin.categories.creer');
    }

    public function enregistrer(Request $request)
    {
        $request->validate($this->regles());

        Categorie::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('admin_categorie_liste')->with('success', 'Catégorie ajoutée');
    }

    public function modifier($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('admin.categories.modifier', [
            'categorie' => $categorie
        ]);
    }

    public function mettre_a_jour(Request $request, $id)
    {
        $categorie = Categorie::findOrFail($id);

        $request->validate($this->regles());

        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect()->route('admin_categorie_liste')->with('success', 'Catégorie modifiée');
    }

    public function supprimer($id)
    {
        $categorie = Categorie::findOrFail($id);

        // les liens produit <-> catégorie sont supprimés en cascade (table pivot), pas les produits
        $categorie->delete();

        return redirect()->route('admin_categorie_liste')->with('success', 'Catégorie supprimée');
    }
}
