<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web_site</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5 text-center">

                            <img id="log" src="/images/colis.png" alt="logo-du-site" class="mb-3" style="max-height: 100px;">

                            <h1 class="fw-bold mb-4">Pancha</h1>

                            <p class="lead">Bienvenue chez Pancha, le leader du marché du sport en France</p>

                            

                            <hr class="my-4">

                           

                            @auth

                            

                                <p>Salut {{ Auth::user()->name }}.</p>

                                

                                <p>Voulez-vous vous déconnecter ?</p>

                                <a href="{{ url('/deconnexion') }}" class="btn btn-outline-danger btn-lg" onclick="event.preventDefault();document.getElementById('deconnexion-form').submit();">Se déconnecter</a>

                                <!-- faire fonctionner la deco avec la methode post plutot que get -->
                                <form id="deconnexion-form" action="{{ route('deconnexion') }}" method="post">
                                    @csrf
                                </form>


                                





                            

                            @else

                               
                                <br><br>

                                <a id="inscrit" href="{{ url('/inscription') }}" class="btn btn-outline-secondary btn-lg">Inscrivez-vous</a>

                                <br><br>

                                <a id="connexion" href="{{ url('/connexion') }}" class="btn btn-outline-secondary btn-lg">Connectez-vous</a>


                                <br><br>

                                <a id="nom" href="{{ url('/admin') }}" class="btn btn-outline-secondary btn-lg">Accéder à la page Admin </a>

                          

                                


                            @endauth


                            

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