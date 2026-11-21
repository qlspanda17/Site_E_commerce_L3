<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function produit_index(Request $request)
    {
        $categories = Categorie::orderBy('nom')->get();

        $requete = Product::with('categories')->orderBy('nom');

        // filtre par catégorie (relation plusieurs-à-plusieurs)
        if ($request->filled('categorie_id')) {
            $requete->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->categorie_id);
            });
        }

        return view('produits', [
            'products' => $requete->get(),
            'categories' => $categories,
            'categorie_id' => $request->categorie_id
        ]);
    }

    public function produit_afficher($id)
    {
        $produit = Product::with('categories')->findOrFail($id);

        return view('produit_detail', [
            'produit' => $produit
        ]);
    }
}
