<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-4">

        <h1 class="h3 mb-4">Nos produits</h1>

        <div class="row g-3">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">

                    {{-- ICI : le bloc image --}}
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->nom }}" class="card-img-top" style="height:180px; object-fit:cover;">
                    @else
                        <img src="{{ asset('images/produits/placeholder.jpg') }}" alt="Pas d'image" class="card-img-top" style="height:180px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nom }}</h5>
                        <p class="card-text">{{ $product->prix }} €</p>
                        <p class="card-text text-muted small">
                            @foreach($product->categories as $categorie)
                                {{ $categorie->nom }}
                            @endforeach
                        </p>
                        <a href="/produits/{{ $product->id }}" class="btn btn-outline-secondary btn-sm">Voir</a>
                        <a href="/ajouter_panier/{{ $product->id }}" class="btn btn-primary btn-sm">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ url('/panier') }}" class="btn btn-primary">Voir mon panier</a>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Retour</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>