<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Pancha</span>
        </div>
    </nav>

    <div class="container py-4">

        <h1 class="h3 mb-4">Mes commandes</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @forelse($orders as $order)

            <div class="card shadow-sm mb-3">
                <div class="card-header d-flex justify-content-between">
                    <span>Commande n°{{ $order->id }} — {{ $order->created_at->format('d/m/Y') }}</span>
                    <span class="badge bg-secondary">{{ $order->status }}</span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($order->items as $item)
                        <li class="list-group-item">{{ $item->product->nom }} : {{ $item->quantite }} x {{ $item->prix }} €</li>
                    @endforeach
                </ul>
                <div class="card-footer text-end fw-bold">
                    Total : {{ $order->total }} €
                </div>
            </div>

        @empty

            <p>Aucune commande.</p>

        @endforelse

        <a href="{{ route('welcome_index') }}" class="btn btn-outline-secondary">Retour</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>