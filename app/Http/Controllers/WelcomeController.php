<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;

class WelcomeController extends Controller
{
    public function welcome_index()
    {
        // vitrine : quelques produits disponibles + les catégories
        $produits_vedette = Product::with('categories')
            ->where('stock', '>', 0)
            ->latest()
            ->take(4)
            ->get();

        $categories = Categorie::withCount('products')->orderBy('nom')->get();

        return view('welcome', [
            'produits_vedette' => $produits_vedette,
            'categories' => $categories
        ]);
    }
}
