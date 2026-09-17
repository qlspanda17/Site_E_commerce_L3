<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
     <h1>Liste de catégories</h1>

    @foreach( $categories as $categorie)

    <p>

        {{ $categorie->nom }}
        {{ $categorie->description }}



        <br> <br> 
        <a href="/modifier_categorie/{{ $categorie->id }}">
            Modifier
        </a>
        <br> <br> 
        <a href="/supprimer_categorie/{{$categorie->id }}">
        Supprimer
    </a>
        <br> <br> 
    </p>

    @endforeach

    <br> <br> 
    <a id="retour" href="{{ url('/admin') }}">Retour</a>
    
</body>
</html>