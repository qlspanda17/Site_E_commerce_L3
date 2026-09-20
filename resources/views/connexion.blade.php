<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

                <h1 class="h3 mb-4 text-center">Connexion</h1>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="post" action="{{ url('/connexion') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="email">Votre Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" />
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="souvenir" id="souvenir" value="1" class="form-check-input" {{ old('souvenir') ? 'checked' : '' }} />
                        <label class="form-check-label" for="souvenir">Se souvenir de moi</label>
                    </div>

                    <a href="{{ route('mot_de_passe_oublie') }}">Mot de passe oublié ?</a>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Retour</a>
                    </div>

                    <p class="text-center mt-3">Pas encore de compte ? <a href="{{ url('/inscription') }}">Inscrivez-vous</a></p>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>