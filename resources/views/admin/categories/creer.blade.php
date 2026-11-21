@extends('layouts.app')

@section('titre', 'Ajouter une catégorie')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Ajouter une catégorie</h1>

            <form method="post" action="{{ route('admin_categorie_enregistrer') }}">
                @csrf
                @include('admin.categories.champs', ['categorie' => null])

                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{ route('admin_categorie_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
