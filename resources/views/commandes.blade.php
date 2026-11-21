@extends('layouts.app')

@section('titre', 'Mes commandes')

@section('contenu')
    <h1 class="h3 mb-4">Mes commandes</h1>

    @forelse($orders as $order)
        <div class="card shadow-sm mb-3">
            <div class="card-header d-flex flex-wrap justify-content-between gap-2">
                <span>Commande n°{{ $order->id }} — {{ $order->created_at->format('d/m/Y') }}</span>
                <span class="badge bg-secondary">{{ str_replace('_', ' ', $order->status) }}</span>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($order->items as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item->nom_produit }} × {{ $item->quantite }}</span>
                        <span>{{ number_format($item->prix * $item->quantite, 2, ',', ' ') }} €</span>
                    </li>
                @endforeach
            </ul>
            <div class="card-footer d-flex flex-wrap justify-content-between gap-2">
                <span class="small text-muted">Livraison {{ $order->mode_livraison }} à {{ $order->nom_livraison }}, {{ $order->adresse_livraison }}</span>
                <span class="fw-bold">Total : {{ number_format($order->total, 2, ',', ' ') }} €</span>
            </div>
        </div>
    @empty
        <p class="text-muted">Aucune commande pour le moment.</p>
        <a href="{{ route('produit_index') }}" class="btn btn-success">Voir les produits</a>
    @endforelse
@endsection
