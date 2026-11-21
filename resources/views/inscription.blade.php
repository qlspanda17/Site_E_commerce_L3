@extends('layouts.app')

@section('titre', 'Inscription')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h1 class="h3 mb-4 text-center">Inscription</h1>

            <form method="post" action="{{ route('inscription_store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Votre nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autocomplete="name">
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Mot de passe <span class="text-muted small">(6 caractères min.)</span></label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Répéter votre mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="conditions" id="conditions" value="1" class="form-check-input">
                    <label class="form-check-label" for="conditions">
                        J'accepte les <a href="{{ route('terme') }}" target="_blank">termes du service</a>
                    </label>
                    @error('conditions') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </div>

                <p class="text-center mt-3">Déjà un compte ? <a href="{{ route('connexion_index') }}">Connectez-vous</a></p>
            </form>
        </div>
    </div>
@endsection
