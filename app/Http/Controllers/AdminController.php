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

class AdminController extends Controller
{






    public function admin() {

        $parcels = Parcel::all() ;

        $nbParcels = count($parcels) ;

        return view('admin',['nbParcels' => $nbParcels] ) ;

    }









}
