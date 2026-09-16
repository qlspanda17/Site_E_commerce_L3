<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Categorie extends Model
{
    protected $fillable = [

        'nom',
        'description'


    ] ;


    public function products()
{
    return $this->belongsToMany(
        Product::class
    );
}
}
