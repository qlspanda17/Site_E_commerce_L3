<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class CommandeController extends Controller
{
    public function formulaire()
    {
        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect()->route('panier_index')->with('error', 'Votre panier est vide');
        }

        return view('commande_formulaire', [
            'nom_defaut' => Auth::user()->name
        ]);
    }

    public function valider(Request $request)
    {
        $request->validate([
            'nom_livraison' => 'required|string|max:255',
            'adresse_livraison' => 'required|string|max:255',
            'message' => 'nullable|string|max:500',
            'mode_livraison' => 'required|in:standard,express',
            'conditions' => 'accepted'
        ], [
            'conditions.accepted' => 'Veuillez accepter les conditions générales'
        ]);

        $panier = session()->get('panier', []);

        $produits = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $product = Product::find($id);

            if (! $product) {
                continue;
            }

            if ($quantite > $product->stock) {
                return redirect()->route('panier_index')->with('error', 'Stock insuffisant pour ' . $product->nom);
            }

            $produits[] = [
                'product' => $product,
                'quantite' => $quantite
            ];

            $total += $product->prix * $quantite;
        }

        if (empty($produits)) {
            return redirect()->route('panier_index')->with('error', 'Votre panier est vide');
        }

        // transaction : soit la commande, ses lignes et la mise à jour du stock sont toutes enregistrées, soit rien
        DB::transaction(function () use ($request, $produits, $total) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'nom_livraison' => $request->nom_livraison,
                'adresse_livraison' => $request->adresse_livraison,
                'message' => $request->message,
                'mode_livraison' => $request->mode_livraison
            ]);

            foreach ($produits as $item) {
                $order->items()->create([
                    'product_id' => $item['product']->id,
                    'nom_produit' => $item['product']->nom,
                    'quantite' => $item['quantite'],
                    'prix' => $item['product']->prix
                ]);

                $item['product']->decrement('stock', $item['quantite']);
            }
        });

        session()->forget('panier');

        return redirect()->route('commandes_index')->with('success', 'Commande validée');
    }

    public function index()
    {
        $orders = Order::with('items')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('commandes', [
            'orders' => $orders
        ]);
    }
}
