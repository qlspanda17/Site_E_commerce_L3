<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

     <h1>Mon panier</h1>

        
        @foreach($produits as $item)

        <p>

            {{ $item['product']->nom }}

            -

            {{ $item['product']->prix }} €

            -

            Quantité :

            {{ $item['quantite'] }}




        </p>



        @endforeach

            <h2>Total : {{ $total }} € </h2>





    <br> <br> 
    <a id="inscrit" href="{{ url('/liste_produits') }}" class="btn btn-outline-secondary btn-lg"> Acceder au produit produits</a>


</body>
</html>