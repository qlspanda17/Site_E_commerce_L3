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

                            <p>
                            
                                Nombre de produits :
                                {{ $nbProduits }}
                            </p>
                            <br>
                            <a id="inscrit" href="{{ url('/liste_produits') }}" class="btn btn-outline-secondary btn-lg"> Afficher les produits</a>
                            <p>
                            
                                Nombre de catégorie :
                                {{ $nbCategories }}
                            </p>
                            <a id="categorie" href="{{ url('/liste_categories') }}" class="btn btn-outline-secondary btn-lg"> Afficher les categories</a>

                            <br><br>

                            <a id="nom" href="{{ url('/panier') }}" class="btn btn-outline-secondary btn-lg">Acceder au panier</a>

                    <br> <br>
                    <p>Voulez-vous vous déconnecter ?</p>

                    <a href="{{ url('/deconnexion') }}" class="btn btn-outline-danger btn-lg" onclick="event.preventDefault();document.getElementById('deconnexion-form').submit();">Se déconnecter</a>

                    <!-- faire fonctionner la deco avec la methode post plutot que get -->
                    <form id="deconnexion-form" action="{{ route('deconnexion') }}" method="post">
                                    @csrf
                    </form>


                
                    <br><br>

                    <a id="Enregistrer" href="{{ url('/register') }}" class="btn btn-primary btn-lg">Enregistrer un nouveau colis</a>

                    <br><br>

                    <a id="nom" href="{{ url('/produit_admin') }}" class="btn btn-outline-secondary btn-lg">Ajouter des produits</a>

                    <br><br>

                    <a id="nom" href="{{ url('/categorie') }}" class="btn btn-outline-secondary btn-lg">Ajouter des categories</a>

                    

                    <br> <br>
                    <a id="retour" href="{{ url('/') }}">Retour</a>


                        
                        

                          

                                


                            



        


</body>



</html>