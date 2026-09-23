<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CommandeController extends Controller
{
    public function formulaire()
    {
        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect()->route('panier_index')->with('error', 'Votre panier est vide');
        }

        return view('commande_formulaire');
    }

    public function valider(Request $request)
    {
        $request->validate([
            'nom_livraison' => 'required|string|max:255',
            'adresse_livraison' => 'required|string|max:255',
            'message' => 'nullable|string|max:500',
            'mode_livraison' => 'required|string',
            'conditions' => 'required'
        ], [
            'conditions.required' => 'Veuillez accepter les conditions générales'
        ]);

        $panier = session()->get('panier', []);

        $produits = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $product = Product::find($id);

            if ($product) {

                if ($quantite > $product->stock) {
                    return redirect()->route('panier_index')->with('error', 'Stock insuffisant pour ' . $product->nom);
                }

                $produits[] = [
                    'product' => $product,
                    'quantite' => $quantite
                ];

                $total += $product->prix * $quantite;
            }
        }

        if (empty($produits)) {
            return redirect()->route('panier_index')->with('error', 'Votre panier est vide');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'nom_livraison' => $request->nom_livraison,
            'adresse_livraison' => $request->adresse_livraison,
            'message' => $request->message,
            'mode_livraison' => $request->mode_livraison
        ]);

        foreach ($produits as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantite' => $item['quantite'],
                'prix' => $item['product']->prix
            ]);

            $item['product']->stock = $item['product']->stock - $item['quantite'];
            $item['product']->save();
        }

        session()->forget('panier');

        return redirect()->route('commandes_index')->with('success', 'Commande validée');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('commandes', [
            'orders' => $orders
        ]);
    }
}