@extends('layouts.app')

@section('titre', 'Mot de passe oublié')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h1 class="h3 mb-3 text-center">Mot de passe oublié</h1>
            <p class="text-muted small text-center">Saisissez votre email : vous recevrez un lien pour choisir un nouveau mot de passe.</p>

            <form method="post" action="{{ route('mot_de_passe_envoyer') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Envoyer le lien</button>
                    <a href="{{ route('connexion_index') }}" class="btn btn-outline-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
@endsection
