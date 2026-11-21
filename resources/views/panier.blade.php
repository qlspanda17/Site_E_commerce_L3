@extends('layouts.app')

@section('titre', 'Mon panier')

@section('contenu')
    <h1 class="h3 mb-4">Mon panier</h1>

    @if(empty($produits))
        <p class="text-muted">Votre panier est vide.</p>
        <a href="{{ route('produit_index') }}" class="btn btn-success">Voir les produits</a>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-end">Sous-total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ $item['product']->url_image() }}" alt="" class="rounded" style="height:48px; width:48px; object-fit:cover;">
                                <a href="{{ route('produit_afficher', $item['product']->id) }}">{{ $item['product']->nom }}</a>
                            </div>
                        </td>
                        <td class="text-nowrap">{{ number_format($item['product']->prix, 2, ',', ' ') }} €</td>
                        <td class="text-center text-nowrap">
                            <form action="{{ route('panier_retirer', $item['product']->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm" aria-label="Retirer un">−</button>
                            </form>
                            <span class="mx-2">{{ $item['quantite'] }}</span>
                            <form action="{{ route('panier_ajouter', $item['product']->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm" aria-label="Ajouter un" @disabled($item['quantite'] >= $item['product']->stock)>+</button>
                            </form>
                        </td>
                        <td class="text-end text-nowrap">{{ number_format($item['sous_total'], 2, ',', ' ') }} €</td>
                        <td class="text-end">
                            <form action="{{ route('panier_supprimer', $item['product']->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <a href="{{ route('produit_index') }}" class="btn btn-outline-secondary">Continuer mes achats</a>
            <div class="text-end">
                <p class="h4 mb-2">Total : {{ number_format($total, 2, ',', ' ') }} €</p>
                @guest
                    <p class="small text-muted mb-2">Vous devrez vous connecter pour valider la commande.</p>
                @endguest
                <a href="{{ route('commande_formulaire') }}" class="btn btn-success btn-lg">Passer commande</a>
            </div>
        </div>
    @endif
@endsection
