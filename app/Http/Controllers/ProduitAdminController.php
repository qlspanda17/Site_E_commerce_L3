<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ProduitAdminController extends Controller
{
    public function produit() {

        return view('produit_admin') ;


    }

    public function traiterProduit(Request $request) {

        $request->validate([

            'nom'=> 'required|string|max:255',
            'description'=> 'required|string|max:800',
            'prix'=> 'required|numeric|min:1' ,
            'stock' => 'required|min:0'





        ]); 


            $produit_admin = Product::create([

                'nom' => $request->nom ,
                'description'=> $request->description ,
                'prix'=> $request->prix ,
                'stock'=> $request->stock

            ]);

            return redirect('/produit_admin');



    }


    public function listeProduits()
{
        $products = Product::all();

    return view(
        'liste_produits',
        [
            'products' => $products
        ]
    );
}

  
        public function modifierProduit($id)
        {

        $product = Product::find($id);
        
        return view('modifier_produit',['product' => $product]);

        }


    public function majProduit(Request $request,$id)
        {
        $product = Product::find($id);
        
        $product->nom = $request->nom;
        
        $product->prix = $request->prix;
    
        $product->save();
    
    return redirect('/liste_produits');

        }

        public function supprimerProduit(Request $request,$id)
        {

        $product = Product::find($id);
        
        $product->delete() ;
        
    
        return redirect('/liste_produits');

        }










}
