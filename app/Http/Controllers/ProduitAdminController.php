<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class ProduitAdminController extends Controller
{
    // Règles de validation communes à la création et à la modification
    private function regles(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:800',
            'prix' => 'required|numeric|min:0.01|max:999999',
            'stock' => 'required|integer|min:0',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ];
    }

    // Copie l'image envoyée dans public/images/produits et renvoie son chemin
    private function enregistrer_image(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $nom_fichier = time() . '_' . uniqid() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/produits'), $nom_fichier);

        return 'images/produits/' . $nom_fichier;
    }

    public function liste()
    {
        $products = Product::with('categories')->orderBy('nom')->get();

        return view('admin.produits.liste', [
            'products' => $products
        ]);
    }

    public function creer()
    {
        return view('admin.produits.creer', [
            'categories' => Categorie::orderBy('nom')->get()
        ]);
    }

    public function enregistrer(Request $request)
    {
        $request->validate($this->regles());

        $product = Product::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $this->enregistrer_image($request)
        ]);

        // un produit peut appartenir à plusieurs catégories (table pivot categorie_product)
        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('admin_produit_liste')->with('success', 'Produit ajouté');
    }

    public function modifier($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.produits.modifier', [
            'product' => $product,
            'categories' => Categorie::orderBy('nom')->get()
        ]);
    }

    public function mettre_a_jour(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate($this->regles());

        $product->nom = $request->nom;
        $product->description = $request->description;
        $product->prix = $request->prix;
        $product->stock = $request->stock;

        $nouvelle_image = $this->enregistrer_image($request);
        if ($nouvelle_image) {
            $product->image = $nouvelle_image;
        }

        $product->save();

        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('admin_produit_liste')->with('success', 'Produit modifié');
    }

    public function supprimer($id)
    {
        $product = Product::findOrFail($id);

        // les lignes de commande déjà passées sont conservées (product_id passe à null)
        $product->delete();

        return redirect()->route('admin_produit_liste')->with('success', 'Produit supprimé');
    }
}
