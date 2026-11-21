@extends('layouts.app')

@section('titre', 'Produits')

@section('contenu')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <h1 class="h3 mb-0">Produits</h1>
        <a href="{{ route('admin_produit_creer') }}" class="btn btn-success">Ajouter un produit</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégories</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td><img src="{{ $product->url_image() }}" alt="{{ $product->nom }}" class="rounded" style="height:60px; width:60px; object-fit:cover;"></td>
                    <td>{{ $product->nom }}</td>
                    <td class="small">{{ $product->categories->pluck('nom')->join(', ') ?: '—' }}</td>
                    <td class="text-nowrap">{{ number_format($product->prix, 2, ',', ' ') }} €</td>
                    <td>
                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">{{ $product->stock }}</span>
                    </td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('admin_produit_modifier', $product->id) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin_produit_supprimer', $product->id) }}" method="post" class="d-inline" onsubmit="return confirm('Supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-muted">Aucun produit.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin') }}" class="btn btn-outline-secondary">Retour</a>
@endsection
