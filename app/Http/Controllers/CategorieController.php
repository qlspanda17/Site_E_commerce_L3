<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
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






    }




}


