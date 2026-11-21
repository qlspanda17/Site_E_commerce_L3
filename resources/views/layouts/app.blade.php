<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Pancha') — Pancha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Barre de navigation commune à toutes les pages (repliable sur mobile) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome_index') }}">Pancha</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu_principal" aria-controls="menu_principal" aria-expanded="false" aria-label="Ouvrir le menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu_principal">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome_index') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('produit_index') }}">Produits</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('commandes_index') }}">Mes commandes</a></li>
                        @if(Auth::user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}">Administration</a></li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('panier_index') }}">
                            Panier <span class="badge bg-light text-success">{{ array_sum(session('panier', [])) }}</span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item"><span class="nav-link">{{ Auth::user()->name }}</span></li>
                        <li class="nav-item">
                            <form action="{{ route('deconnexion') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Se déconnecter</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('connexion_index') }}">Connexion</a></li>
                        <li class="nav-item"><a class="btn btn-light btn-sm" href="{{ route('inscription_index') }}">Inscription</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4 flex-grow-1">

        {{-- Messages flash affichés après une redirection --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('contenu')

    </main>

    <footer class="bg-light border-top py-3 text-center small text-muted">
        Pancha — fleuriste en ligne · <a href="{{ route('terme') }}">Conditions générales</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
