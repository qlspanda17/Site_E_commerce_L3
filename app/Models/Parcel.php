<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Parcel extends Model
{
    use HasFactory ;
    //Definir l'accessibilité de nos propriétés 

    protected  $fillable = [ 

        'adresse_dep',
        'adresse_arr',
        'poids'  



     ] ;
}
