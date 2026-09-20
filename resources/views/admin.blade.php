<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pancha - Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha — Administration</span>
        </div>
    </nav>

    <div class="container py-4">

        <div class="row g-4">

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Produits</h5>
                        <p class="card-text">Nombre de produits : {{ $nbProduits }}</p>
                        <a href="{{ url('/liste_produits') }}" class="btn btn-outline-secondary">Afficher les produits</a>
                        <a href="{{ url('/produit_admin') }}" class="btn btn-primary">Ajouter un produit</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Catégories</h5>
                        <p class="card-text">Nombre de catégories : {{ $nbCategories }}</p>
                        <a href="{{ url('/liste_categories') }}" class="btn btn-outline-secondary">Afficher les catégories</a>
                        <a href="{{ url('/categorie') }}" class="btn btn-primary">Ajouter une catégorie</a>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <a href="{{ url('/panier') }}" class="btn btn-outline-secondary">Accéder au panier</a>

        <form action="{{ route('deconnexion') }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-outline-danger">Se déconnecter</button>
        </form>

        <a href="{{ route('welcome_index') }}" class="btn btn-link">Retour à l'accueil</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>