<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }

    // URL de l'image du produit, ou d'une image par défaut s'il n'en a pas
    public function url_image(): string
    {
        return asset($this->image ?: 'images/produits/placeholder.svg');
    }
}
