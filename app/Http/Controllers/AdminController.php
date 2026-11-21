<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index', [
            'nb_produits' => Product::count(),
            'nb_categories' => Categorie::count(),
            'nb_utilisateurs' => User::count(),
            'nb_commandes' => Order::count(),
            'produits_en_rupture' => Product::where('stock', '<=', 0)->count()
        ]);
    }
}
