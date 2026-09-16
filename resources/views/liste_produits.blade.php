<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des produits</h1>

    @foreach($products as $product)
    <p>
        {{ $product->nom }}

        {{ $product->prix }} €
    </p>
    
    <br>

    <a href="/modifier_produit/{{ $product->id }}" >
        Modifier
    </a>

    <br> 
    <a href="/supprimer_produit/{{ $product->id }}">
        Supprimer
    </a>
    @endforeach

</body>
</html>