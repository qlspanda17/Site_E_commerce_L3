<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-4">

        <h1 class="h3 mb-4">Mon panier</h1>

        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $item)
                <tr>
                    <td>{{ $item['product']->nom }}</td>
                    <td>{{ $item['product']->prix }} €</td>
                    <td>{{ $item['quantite'] }}</td>
                    <td class="text-end">
                        <a href="/retirer_panier/{{ $item['product']->id }}" class="btn btn-outline-danger btn-sm">Retirer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="h4">Total : {{ $total }} €</h2>

        <a href="{{ route('commande_formulaire') }}" class="btn btn-primary mb-3">Passer commande</a>

        <a href="{{ url('/liste_produits') }}" class="btn btn-outline-secondary">Accéder aux produits</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>