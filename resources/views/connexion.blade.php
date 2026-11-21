@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h1 class="h3 mb-4 text-center">Connexion</h1>

            <form method="post" action="{{ route('connexion_store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="current-password">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="souvenir" id="souvenir" value="1" class="form-check-input" @checked(old('souvenir'))>
                        <label class="form-check-label" for="souvenir">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('mot_de_passe_oublie') }}" class="small">Mot de passe oublié ?</a>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Se connecter</button>
                </div>

                <p class="text-center mt-3">Pas encore de compte ? <a href="{{ route('inscription_index') }}">Inscrivez-vous</a></p>
            </form>
        </div>
    </div>
@endsection
