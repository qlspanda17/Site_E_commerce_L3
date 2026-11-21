@extends('layouts.app')

@section('titre', 'Ajouter un utilisateur')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Ajouter un utilisateur</h1>

            <form method="post" action="{{ route('admin_utilisateur_enregistrer') }}">
                @csrf
                @include('admin.utilisateurs.champs', ['utilisateur' => null])

                <div class="mb-3">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Répéter le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Créer</button>
                <a href="{{ route('admin_utilisateur_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
