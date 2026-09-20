<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;
class Product extends Model
{
    use HasFactory ;
    protected $fillable = [ "nom",
        "description",
        "prix",
        "stock", 
        "image"
    ] ;



    public function categories()
{
    return $this->belongsToMany(
        Categorie::class
    );
}

}