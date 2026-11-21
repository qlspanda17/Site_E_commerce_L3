@extends('layouts.app')

@section('titre', 'Catégories')

@section('contenu')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <h1 class="h3 mb-0">Catégories</h1>
        <a href="{{ route('admin_categorie_creer') }}" class="btn btn-success">Ajouter une catégorie</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Produits</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $categorie)
                <tr>
                    <td>{{ $categorie->nom }}</td>
                    <td class="small">{{ $categorie->description }}</td>
                    <td>{{ $categorie->products_count }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('admin_categorie_modifier', $categorie->id) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin_categorie_supprimer', $categorie->id) }}" method="post" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ? Les produits sont conservés.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-muted">Aucune catégorie.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin') }}" class="btn btn-outline-secondary">Retour</a>
@endsection
