<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'nom_livraison',
        'adresse_livraison',
        'message',
        'mode_livraison'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}