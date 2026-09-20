<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;


class InscriptionController extends Controller
{
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
                'password' => Hash::make($request->password),
                'role' => 'user'




            ]) ;

            return redirect()->route('connexion_index'); 



        }

}
