@extends('layouts.app')

@section('titre', 'Ajouter un produit')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Ajouter un produit</h1>

            {{-- enctype obligatoire pour pouvoir envoyer un fichier --}}
            <form method="post" action="{{ route('admin_produit_enregistrer') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.produits.champs', ['product' => null])

                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{ route('admin_produit_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
