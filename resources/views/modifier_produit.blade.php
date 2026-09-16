<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <h1>Modifier produit</h1>

        <form method="post" action="">
            @csrf
            
            <input name= "nom" value="{{ $product->nom }}">

            <input type="number" name="prix" value="{{ $product->prix }}">
            
            <button type="submit">
                Modifier
            </button>
           
        </form>
</body>
</html>