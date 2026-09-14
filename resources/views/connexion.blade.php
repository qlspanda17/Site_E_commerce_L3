<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Connexion</p>

                                    @if (session('error'))
                                        <span role="alert" class="text-danger">{{ session('error') }}</span>
                                    @endif

                                    <form class="mx-1 mx-md-4" method="post" action="{{ url('/connexion') }}">
                                        @csrf

                                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" />
                                        <label class="form-label" for="email">Votre Email</label>
                                        @error('email')
                                            <span role="alert"> {{ $message }}</span>
                                        @enderror

                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Mot de passe</label>
                                        @error('password')
                                            <span role="alert"> {{ $message }}</span>
                                        @enderror

                                        <input  type="checkbox" value="" name="souvenir"{{ old('souvenir') == 'on'? 'checked' : '' }} />
                                        <label class="form-check-label" for="souvenir">Se souvenir de moi</label>

                                        <p class="text-center"><a href="{{ url('/mot-de-passe-oublie') }}">Mot de passe oublié ?</a></p>

                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                                            <a id="retour" href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">Retour</a>
                                        </div>

                                        <p class="text-center mt-4">Pas encore de compte ? <a href="{{ url('/inscription') }}">Inscrivez-vous</a></p>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>