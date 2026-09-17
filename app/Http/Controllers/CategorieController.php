<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;


class CategorieController extends Controller
{
    public function categorie() {


        return view("categorie") ;

    }



    public function traiterCategorie(Request $request) {


        $request->validate([

            'nom'=> 'required|string|max:255',
            'description' => 'required|string|max:255'


        ]) ;

        $categorie = Categorie::create( [

            'nom'=> $request->nom ,
            'description' => $request->description


        ]) ;

        return redirect('/categorie');


    }




    public function listeCategories()
{
    $categories = Categorie::all();

    return view(
        'liste_categories',
        [
            'categories' => $categories
        ]
    );
    return redirect('/liste_categories');
}




    public function modifierCategorie($id)
{
    $categorie = Categorie::find($id);

    return view(
        'modifier_categorie',
        [
            'categorie' => $categorie
        ]
    );

    
}




    public function majCategorie(Request $request,$id)

{
    $categorie = Categorie::find($id);

    $categorie->nom = $request->nom;
    $categorie->description = $request->description;


    $categorie->save();

    return redirect('/liste_categories');
}





    public function supprimerCategorie($id)
{
    $categorie = Categorie::find($id);

    $categorie->delete();

    return redirect('/liste_categories');
}





}


