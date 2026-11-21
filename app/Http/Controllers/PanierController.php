<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PanierController extends Controller
{
    // Le panier est stocké en session (cookie de session) sous la forme [id_produit => quantite].
    // Il fonctionne donc aussi pour un visiteur non connecté.

    public function panier_index()
    {
        $panier = session()->get('panier', []);

        $produits = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $product = Product::find($id);

            // produit supprimé entre-temps par un admin : on le retire du panier
            if (! $product) {
                unset($panier[$id]);
                continue;
            }

            $sous_total = $product->prix * $quantite;
            $total += $sous_total;

            $produits[] = [
                'product' => $product,
                'quantite' => $quantite,
                'sous_total' => $sous_total
            ];
        }

        session()->put('panier', $panier);

        return view('panier', [
            'produits' => $produits,
            'total' => $total
        ]);
    }

    public function ajouter($id)
    {
        $product = Product::findOrFail($id);

        $panier = session()->get('panier', []);
        $quantite_actuelle = $panier[$id] ?? 0;

        if ($quantite_actuelle + 1 > $product->stock) {
            return back()->with('error', 'Stock insuffisant pour ' . $product->nom);
        }

        $panier[$id] = $quantite_actuelle + 1;
        session()->put('panier', $panier);

        return back()->with('success', $product->nom . ' ajouté au panier');
    }

    public function retirer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]--;

            if ($panier[$id] <= 0) {
                unset($panier[$id]);
            }
        }

        session()->put('panier', $panier);

        return redirect()->route('panier_index');
    }

    public function supprimer($id)
    {
        $panier = session()->get('panier', []);

        unset($panier[$id]);

        session()->put('panier', $panier);

        return redirect()->route('panier_index');
    }
}
