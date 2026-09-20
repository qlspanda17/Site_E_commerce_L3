<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pancha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-5 text-center">

        <h1 class="mb-3">Pancha</h1>
        <p class="lead mb-4">Bienvenue chez Pancha, le leader du marché des fleuristes en France</p>

        <a href="{{ route('produit_index') }}" class="btn btn-primary btn-lg mb-4">Voir les produits</a>

        @auth

            <p>Salut {{ Auth::user()->name }}.</p>

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('admin') }}" class="btn btn-outline-secondary">Accéder à la page Admin</a>
            @endif

            <div class="mt-3">
                <a href="{{ route('commandes_index') }}" class="btn btn-outline-secondary">Mes commandes</a>
                <a href="{{ route('panier_index') }}" class="btn btn-outline-secondary">Mon panier</a>
            </div>

            <form action="{{ route('deconnexion') }}" method="post" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
            </form>

        @else

            <div>
                <a href="{{ route('inscription_index') }}" class="btn btn-outline-secondary">Inscrivez-vous</a>
                <a href="{{ route('connexion_index') }}" class="btn btn-outline-secondary">Connectez-vous</a>
            </div>

        @endauth

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>