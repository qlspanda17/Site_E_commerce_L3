<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <h1>Modifier Categorie</h1>

        <form method="post" action="">
            @csrf
            
            <input name= "nom" value="{{ $categorie->nom }}">
            <br> <br> 
            <input type="description" name="description" value="{{ $categorie->description }}">
            <br> <br> 
            <button type="submit">
                Modifier
            </button>
           
        </form>
</body>
</html>