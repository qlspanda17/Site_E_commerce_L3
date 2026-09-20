<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

                <h1 class="h3 mb-4 text-center">Inscription</h1>

                <form method="post" action="{{ url('/inscription') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">Votre nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

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

                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Répéter votre mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="conditions" id="conditions" class="form-check-input" />
                        <label class="form-check-label" for="conditions">
                            J'accepte tous les <a href="#!">Termes du service</a>
                        </label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Retour</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>