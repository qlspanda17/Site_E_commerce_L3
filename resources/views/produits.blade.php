@extends('layouts.app')

@section('titre', 'Nos produits')

@section('contenu')
    <h1 class="h3 mb-3">Nos produits</h1>

    {{-- Filtre par catégorie --}}
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('produit_index') }}" class="btn btn-sm {{ $categorie_id ? 'btn-outline-success' : 'btn-success' }}">Toutes</a>
        @foreach($categories as $categorie)
            <a href="{{ route('produit_index', ['categorie_id' => $categorie->id]) }}" class="btn btn-sm {{ $categorie_id == $categorie->id ? 'btn-success' : 'btn-outline-success' }}">{{ $categorie->nom }}</a>
        @endforeach
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse($products as $product)
            <div class="col">
                @include('composants.carte_produit', ['product' => $product])
            </div>
        @empty
            <p class="text-muted">Aucun produit dans cette catégorie.</p>
        @endforelse
    </div>
@endsection
