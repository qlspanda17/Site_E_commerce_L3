<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Parcel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Auth ;
use Session;




class ConnexionController extends Controller
{
     public function connexion_index() {


            return view('connexion') ;




        }

        public function connexion_store(Request $request): RedirectResponse
        {


            $request->validate([

                'email' => 'required',
                'password' => 'required'


            ]);

            $credentials = $request->only('email','password') ;
                

            

               if ( Auth::attempt($credentials, $request->boolean('souvenir'))) {
 
                    if (Auth::user()->role =="admin") {
 
                        return redirect('/admin');
                    }
 
                        return redirect()->route('welcome_index'); 
                    
 
 
                }

            return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->onlyInput('email');

         
        }

        public function deconnexion(): RedirectResponse {

            //J'efface d'abord la session , les cookies

            Session::flush() ;
            
            Auth::logout() ;

            return redirect('/')->with('status','Déconnection réussis') ;




        }

        

}


