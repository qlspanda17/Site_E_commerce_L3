<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PanierController extends Controller
{
    public function panier_index () 
    
    {


        $panier = session()->get('panier', []);

        $produits = [];

        
        foreach($panier as $id => $quantite)
        {
            $product = Product::find($id);

            if ($product) { 

                $produits[] = [
                    'product' => $product,
                    'quantite' => $quantite
                ];

            }
        }


        $total = 0;

        foreach($produits as $item)

        {
            $total +=
                $item['product']->prix
                *
                $item['quantite'];
        }

        return view(
            'panier',
            [
                'produits' => $produits,
                'total' => $total
            ]
        );


    }


    public function ajouter($id)

    {
        $product = Product::find($id);

            
        $panier = session()->get('panier', []);

        if(isset($panier[$id]))
        {
            $panier[$id]++;
        }
        else
        {
            $panier[$id] = 1;
        }

        session()->put('panier',$panier);

    return redirect('/panier');


    }



}
