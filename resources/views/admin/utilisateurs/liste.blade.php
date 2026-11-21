@extends('layouts.app')

@section('titre', 'Utilisateurs')

@section('contenu')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <h1 class="h3 mb-0">Utilisateurs</h1>
        <a href="{{ route('admin_utilisateur_creer') }}" class="btn btn-success">Ajouter un utilisateur</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Inscrit le</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->name }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>
                        <span class="badge {{ $utilisateur->role == 'admin' ? 'bg-danger' : 'bg-secondary' }}">{{ $utilisateur->role }}</span>
                    </td>
                    <td>{{ $utilisateur->created_at?->format('d/m/Y') }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('admin_utilisateur_modifier', $utilisateur->id) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                        @if($utilisateur->id != Auth::id())
                            <form action="{{ route('admin_utilisateur_supprimer', $utilisateur->id) }}" method="post" class="d-inline" onsubmit="return confirm('Supprimer cet utilisateur et ses commandes ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin') }}" class="btn btn-outline-secondary">Retour</a>
@endsection
