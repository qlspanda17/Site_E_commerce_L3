<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProduitController extends Controller
{
    public function produit_index()
    {
        $products = Product::all();
 
        return view('produits', [
            'products' => $products
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
