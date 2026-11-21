@extends('layouts.app')

@section('titre', 'Administration')

@section('contenu')
    <h1 class="h3 mb-4">Administration</h1>

    <div class="row g-4">

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 card-title">Produits</h2>
                    <p class="card-text">
                        {{ $nb_produits }} produit(s)
                        @if($produits_en_rupture > 0)
                            <br><span class="text-danger small">{{ $produits_en_rupture }} en rupture de stock</span>
                        @endif
                    </p>
                    <a href="{{ route('admin_produit_liste') }}" class="btn btn-outline-secondary btn-sm">Gérer</a>
                    <a href="{{ route('admin_produit_creer') }}" class="btn btn-success btn-sm">Ajouter</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 card-title">Catégories</h2>
                    <p class="card-text">{{ $nb_categories }} catégorie(s)</p>
                    <a href="{{ route('admin_categorie_liste') }}" class="btn btn-outline-secondary btn-sm">Gérer</a>
                    <a href="{{ route('admin_categorie_creer') }}" class="btn btn-success btn-sm">Ajouter</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 card-title">Utilisateurs</h2>
                    <p class="card-text">{{ $nb_utilisateurs }} utilisateur(s) · {{ $nb_commandes }} commande(s)</p>
                    <a href="{{ route('admin_utilisateur_liste') }}" class="btn btn-outline-secondary btn-sm">Gérer</a>
                    <a href="{{ route('admin_utilisateur_creer') }}" class="btn btn-success btn-sm">Ajouter</a>
                </div>
            </div>
        </div>

    </div>
@endsection
