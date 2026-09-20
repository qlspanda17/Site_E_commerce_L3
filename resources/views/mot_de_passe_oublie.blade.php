<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
</head>
<body>

    <h1>Mot de passe oublié</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ route('mot_de_passe_envoyer') }}">
        @csrf
        <input type="email" name="email" placeholder="Votre email" required>
        <button type="submit">Envoyer</button>
    </form>

</body>
</html>