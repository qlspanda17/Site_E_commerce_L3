@extends('layouts.app')

@section('titre', 'Accueil')

@section('contenu')

    {{-- Bannière d'accueil --}}
    <div class="p-4 p-md-5 mb-5 rounded-3 bg-success-subtle text-center">
        <h1 class="display-5 fw-bold text-success">Pancha</h1>
        <p class="lead mb-4">Bouquets, plantes et fleurs tropicales livrés chez vous.</p>
        <a href="{{ route('produit_index') }}" class="btn btn-success btn-lg">Voir tous les produits</a>

        @guest
            <p class="mt-3 mb-0">
                <a href="{{ route('connexion_index') }}">Connectez-vous</a> ou
                <a href="{{ route('inscription_index') }}">créez un compte</a> pour passer commande.
            </p>
        @endguest
    </div>

    {{-- Catégories --}}
    <h2 class="h4 mb-3">Nos catégories</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 mb-5">
        @foreach($categories as $categorie)
            <div class="col">
                <a href="{{ route('produit_index', ['categorie_id' => $categorie->id]) }}" class="card h-100 text-decoration-none text-dark shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 card-title text-success">{{ $categorie->nom }}</h3>
                        <p class="card-text small text-muted mb-1">{{ $categorie->description }}</p>
                        <span class="small">{{ $categorie->products_count }} produit(s)</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- Aperçu de quelques produits --}}
    <h2 class="h4 mb-3">Nouveautés</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 mb-5">
        @forelse($produits_vedette as $product)
            <div class="col">
                @include('composants.carte_produit', ['product' => $product])
            </div>
        @empty
            <p class="text-muted">Aucun produit pour le moment.</p>
        @endforelse
    </div>

    @auth
        {{-- Gestion du compte --}}
        <div class="card border-danger-subtle">
            <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>Connecté en tant que <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})</span>
                <form action="{{ route('supprimer_compte') }}" method="post" onsubmit="return confirm('Supprimer définitivement votre compte et vos commandes ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer mon compte</button>
                </form>
            </div>
        </div>
    @endauth

@endsection
