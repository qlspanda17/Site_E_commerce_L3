<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function produit_index(Request $request)
    {
        
        $categories = Categorie::all();

        if ($request->categorie_id) {

            $products = Product::whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->categorie_id);
            })->get();

        } else {

            $products = Product::all();
        }
 
        return view('produits', [
            'products' => $products,
            'categories' => $categories,
            'categorie_id' => $request->categorie_id
        ]);
    }
 
    public function produit_afficher($product)
    {
        $produit = Product::findOrFail($product);
 
        return view('produit_detail', [
            'produit' => $produit
        ]);

    }
}
