<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha — Administration</span>
        </div>
    </nav>

    <div class="container py-4">

        <h1 class="h3 mb-4">Liste des produits</h1>

        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        {{-- ICI : le bloc image --}}
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->nom }}" style="height:60px; width:60px; object-fit:cover;">
                        @else
                            <img src="{{ asset('images/produits/placeholder.jpg') }}" alt="Pas d'image" style="height:60px; width:60px; object-fit:cover;">
                        @endif
                    </td>
                    <td>{{ $product->nom }}</td>
                    <td>{{ $product->prix }} €</td>
                    <td class="text-end">
                        <a href="/modifier_produit/{{ $product->id }}" class="btn btn-outline-secondary btn-sm">Modifier</a>

                        <form action="/supprimer_produit/{{ $product->id }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>

                        <a href="/ajouter_panier/{{ $product->id }}" class="btn btn-outline-primary btn-sm">Ajouter au panier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/admin') }}" class="btn btn-outline-secondary">Retour</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>