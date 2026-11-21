@extends('layouts.app')

@section('titre', 'Modifier un utilisateur')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="h3 mb-4">Modifier {{ $utilisateur->name }}</h1>

            <form method="post" action="{{ route('admin_utilisateur_mettre_a_jour', $utilisateur->id) }}">
                @csrf
                @method('PUT')
                @include('admin.utilisateurs.champs', ['utilisateur' => $utilisateur])

                <div class="mb-3">
                    <label class="form-label" for="password">Nouveau mot de passe <span class="text-muted small">(laisser vide pour ne pas changer)</span></label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Répéter le nouveau mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('admin_utilisateur_liste') }}" class="btn btn-outline-secondary">Retour</a>
            </form>
        </div>
    </div>
@endsection
