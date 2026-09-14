<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optionnel) -->
    
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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscription</p>

                                    

                                    <form class="mx-1 mx-md-4" method="post" action="{{ url('/inscription') }}">
                                        @csrf

                                        
                                            <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name') }}" />
                                            <label class="form-label" for="name">Votre nom</label>
                                        
                                        @error('name')
                                            <span role="alert"> {{$message}}</span>
                                        @enderror

                                        
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('mail') }}" />
                                            <label class="form-label" for="email">Votre Email</label>
                                        
                                        @error('email')
                                            <span role="alert"> {{$message}}</span>
                                        @enderror
                                        
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Mot de passe</label>
                                        
                                         @error('password_confirmation')
                                            <span role="alert"> {{$message}}</span>
                                        @enderror
                                        
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" />
                                            <label class="form-label" for="password_confirmation">Répéter votre mot de passe</label>
                                        

                                        
                                            <input class="form-check-input me-2" type="checkbox" value="" name="conditions" id="conditions" />
                                            <label class="form-check-label" for="conditions">
                                                J'accepte tous les <a href="#!">Termes du service</a>
                                            </label>
                                       

                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>




                                        
                                            <a id="retour" href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">Retour</a>
                                        </div>

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