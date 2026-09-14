<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Parcel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\AuthController ;

class Controller
{
    public function welcome_index () 
    {

        $parcels = Parcel::all() ;

        $nbParcels = count($parcels) ;
        
        return view('welcome', ['nbParcels' => $nbParcels]);
    
    }

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


        

        //Vue sur la page d'inscription

        public function inscription_index() {

            return view('inscription') ;


        }


        public function inscription_store(Request $request) {


            $validator = Validator::make($request->all(), [


            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        
        ]);


            if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput() ;

        } 



            $user = User::create([ 

                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)




            ]) ;

            return redirect()->route('connexion'); 



        }


         





}
