@extends('layouts.app')

@section('titre', $produit->nom)

@section('contenu')
    <div class="row g-4">
        <div class="col-md-6">
            <img src="{{ $produit->url_image() }}" alt="{{ $produit->nom }}" class="img-fluid rounded shadow-sm w-100" style="max-height:420px; object-fit:cover;">
        </div>

        <div class="col-md-6">
            <h1 class="h3">{{ $produit->nom }}</h1>

            <div class="mb-3">
                @foreach($produit->categories as $categorie)
                    <a href="{{ route('produit_index', ['categorie_id' => $categorie->id]) }}" class="badge bg-success text-decoration-none">{{ $categorie->nom }}</a>
                @endforeach
            </div>

            <p>{{ $produit->description }}</p>
            <p class="h4 fw-bold">{{ number_format($produit->prix, 2, ',', ' ') }} €</p>

            @if($produit->stock > 0)
                <p class="small text-muted">{{ $produit->stock }} en stock</p>
                <form action="{{ route('panier_ajouter', $produit->id) }}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                </form>
            @else
                <p class="text-danger">Rupture de stock</p>
            @endif

            <a href="{{ route('produit_index') }}" class="btn btn-outline-secondary">Retour aux produits</a>
        </div>
    </div>
@endsection
