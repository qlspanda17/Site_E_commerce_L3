<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Models\Parcel;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\AuthController ;

class ColisController extends Controller
{
     public function register_index () 
    
    {

        return view('register');



    }

        public function register_new_parcel(Request $request) 
        
        {

            $message = "Colis enregistrée" ;

    // Validé les champs du formulaire , pour pas taper n'importe quoi

        $validator = Validator::make($request->all(), [


            'adresse_dep' => 'required|string|max:255',
            'adresse_arr' => 'required|string|max:255',
            'poids' => 'required|numeric|min:1'
        
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput() ;

        } 


     // Insertion dans la base de donnée 
     $parcel = Parcel::create([
        
        'adresse_dep' => $request->adresse_dep,
        'adresse_arr' => $request->adresse_arr,
        'poids' => $request->poids
     
     
     
     ]) ;

    return view('register',compact('message'));



        }

}
