<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau mot de passe</title>
</head>
<body>

    <h1>Nouveau mot de passe</h1>

    <form method="post" action="{{ route('mot_de_passe_maj') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" value="{{ $email }}" required>
        <input type="password" name="password" placeholder="Nouveau mot de passe" required>
        <input type="password" name="password_confirmation" placeholder="Confirmer" required>
        <button type="submit">Changer</button>
    </form>

</body>
</html>