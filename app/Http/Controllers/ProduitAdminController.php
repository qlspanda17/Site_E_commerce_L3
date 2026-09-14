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





            



        


    }
}
