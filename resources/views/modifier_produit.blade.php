<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <h1>Modifier produit</h1>

        <form method="post" action="/modifier_produit/{{ $product->id }}">
            @csrf

            <input name= "nom" value="{{ $product->nom }}">

            <input type="number" name="prix" value="{{ $product->prix }}">
            
            

            <select name="categorie_id">

                @foreach($categories as $categorie)

                <option value="{{ $categorie->id }}">

                    {{ $categorie->nom }}

                </option>

        @endforeach

        </select>

        <button type="submit">
                Modifier
            </button>
           
        </form>
        


</body>
</html>