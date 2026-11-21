@extends('layouts.app')

@section('titre', 'Modifier une catégorie')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Modifier {{ $categorie->nom }}</h1>

            <form method="post" action="{{ route('admin_categorie_mettre_a_jour', $categorie->id) }}">
                @csrf
                @method('PUT')
                @include('admin.categories.champs', ['categorie' => $categorie])

                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('admin_categorie_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
