<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'nom_produit',
        'quantite',
        'prix'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // peut être null si le produit a été supprimé depuis la commande
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
