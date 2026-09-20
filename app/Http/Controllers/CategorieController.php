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



    public function traiter_categorie(Request $request) {


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




    public function liste_categories()
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




    public function modifier_categorie($id)
{
    $categorie = Categorie::find($id);

    return view(
        'modifier_categorie',
        [
            'categorie' => $categorie
        ]
    );

    
}




    public function maj_categorie(Request $request,$id)

{
    $categorie = Categorie::findOrFail($id);

    $categorie->nom = $request->nom;
    $categorie->description = $request->description;


    $categorie->save();

    return redirect('/liste_categories');
}





    public function supprimer_categorie($id)
{
    $categorie = Categorie::findOrFail($id);

    $categorie->delete();

    return redirect('/liste_categories');
}





}


