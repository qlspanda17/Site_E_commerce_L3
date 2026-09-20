<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Categorie;

class AdminController extends Controller
{


    public function admin() {

        $nbProduits = Product::count();;

        $nbCategories = Categorie::count();

        return view('admin',[
            'nbProduits' => $nbProduits,
            'nbCategories' => $nbCategories
        ]);

    }


}
