<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha — Administration</span>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h1 class="h3 mb-4">Ajouter un produit</h1>

                <form method="post" action="{{ url('/produit_admin') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    <a href="{{ url('/admin') }}" class="btn btn-outline-secondary">Retour</a>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>