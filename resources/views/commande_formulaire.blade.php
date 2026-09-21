<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison</title>
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

                <h1 class="h3 mb-4">Informations de livraison</h1>

                <form method="post" action="{{ route('commande_valider') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom_livraison" class="form-control" value="{{ old('nom_livraison') }}">
                        @error('nom_livraison')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" name="adresse_livraison" class="form-control" value="{{ old('adresse_livraison') }}">
                        @error('adresse_livraison')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message (optionnel)</label>
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mode de livraison</label>
                        <select name="mode_livraison" class="form-select">
                            <option value="standard">Standard</option>
                            <option value="express">Express</option>
                        </select>
                        @error('mode_livraison')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="conditions" id="conditions" class="form-check-input">
                        <label class="form-check-label" for="conditions">J'ai lu et j'accepte les conditions générales</label>
                        @error('conditions')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Valider la commande</button>
                    <a href="{{ route('panier_index') }}" class="btn btn-outline-secondary">Retour</a>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>