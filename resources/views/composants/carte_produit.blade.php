{{-- Carte d'un produit, réutilisée sur l'accueil et la liste des produits --}}
<div class="card h-100 shadow-sm">
    <a href="{{ route('produit_afficher', $product->id) }}">
        <img src="{{ $product->url_image() }}" alt="{{ $product->nom }}" class="card-img-top" style="height:180px; object-fit:cover;">
    </a>
    <div class="card-body d-flex flex-column">
        <h3 class="h6 card-title">
            <a href="{{ route('produit_afficher', $product->id) }}" class="text-decoration-none text-dark">{{ $product->nom }}</a>
        </h3>
        <p class="small text-muted mb-2">{{ $product->categories->pluck('nom')->join(', ') }}</p>
        <p class="fw-bold mb-3">{{ number_format($product->prix, 2, ',', ' ') }} €</p>

        <div class="mt-auto">
            @if($product->stock > 0)
                <form action="{{ route('panier_ajouter', $product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm w-100">Ajouter au panier</button>
                </form>
            @else
                <button class="btn btn-secondary btn-sm w-100" disabled>Rupture de stock</button>
            @endif
        </div>
    </div>
</div>
