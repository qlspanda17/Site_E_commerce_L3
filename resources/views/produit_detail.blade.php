<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h1 class="h3 mb-3">{{ $produit->nom }}</h1>

                {{-- ICI : le bloc image --}}
                @if($produit->image)
                    <img src="{{ asset($produit->image) }}" alt="{{ $produit->nom }}" class="img-fluid mb-3" style="max-height:300px; object-fit:cover;">
                @else
                    <img src="{{ asset('images/produits/placeholder.jpg') }}" alt="Pas d'image" class="img-fluid mb-3" style="max-height:300px; object-fit:cover;">
                @endif

                <p>{{ $produit->description }}</p>
                <p class="fw-bold">{{ $produit->prix }} €</p>

                <a href="/ajouter_panier/{{ $produit->id }}" class="btn btn-primary">Ajouter au panier</a>
                <a href="{{ url('/produits') }}" class="btn btn-outline-secondary">Retour</a>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>