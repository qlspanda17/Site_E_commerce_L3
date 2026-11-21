@extends('layouts.app')

@section('titre', 'Modifier un produit')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Modifier {{ $product->nom }}</h1>

            <form method="post" action="{{ route('admin_produit_mettre_a_jour', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.produits.champs', ['product' => $product])

                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('admin_produit_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
