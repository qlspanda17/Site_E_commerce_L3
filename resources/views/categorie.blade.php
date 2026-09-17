<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ url('/categorie') }}">
        @csrf
    
        <input type="text" name="nom" />
        <label  for="nom"> Nom de la categorie </label>

        <br> <br> 

        <input type="text" name="description" />
        <label  for="description"> Description </label>

        <br> <br> 

        <button type="submit" >Enregistrer </button>

        <br> <br> 
        <a id="retour" href="{{ url('/liste_categories') }}" class="btn btn-outline-secondary btn-lg">Acceder à la liste de catégories</a>

        <br> <br> 
        <a id="retour" href="{{ url('/admin') }}" class="btn btn-outline-secondary btn-lg">Retour sur la page admin</a>

    

    </form>
</body>
</html>