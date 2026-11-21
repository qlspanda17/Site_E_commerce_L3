@extends('layouts.app')

@section('titre', 'Nouveau mot de passe')

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h1 class="h3 mb-4 text-center">Nouveau mot de passe</h1>

            <form method="post" action="{{ route('mot_de_passe_maj') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $email) }}" autocomplete="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Répéter le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Changer le mot de passe</button>
                </div>
            </form>
        </div>
    </div>
@endsection
