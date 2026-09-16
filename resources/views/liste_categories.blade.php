<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1>Liste catégories</h1>

@foreach($categories as $categorie)

<p>

    {{ $categorie->nom }}



    <a href="/modifier_categorie/{{ $categorie->id }}">
        Modifier
    </a>

    <a href="/supprimer_categorie/{{$categorie->id }}">
    Supprimer
</a>

</p>

@endforeach
</body>
</html>