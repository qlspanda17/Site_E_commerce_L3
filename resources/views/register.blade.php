<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>



<body>
    


    <h1> Enregistrer un colis</h1>


    <form actions="{{url('/register')}}" method="post">

        <!-- Pour dire qu'on est l'auteur de ce formulaire-->

        @csrf

        <label for="adresse_dep"> adresse de départ </label>
        <input type="text" name="adresse_dep" placeholder="1 Rue Chank du Colorado">

        <br> 
        <br> 

        <label for="adresse_arr"> adresse d'arriver </label>
        <input type="text" name="adresse_arr" placeholder="22 Rue des Chalamets">

        <br> 
        <br> 

        <label for="poids"> Poids du colis  </label>
        <input type="number" name="poids" placeholder="20 grammes">

        <br> 
        <br> 

        <button type="submit"> Envoyez </button>

        <br> 

    </form>


    @if (isset($message))
        <p>{{ $message }}</p>

    @endif

    <br>
    <a id="retour" href=" {{ url('/')  }}" > Retour </a> 


</body>



</html>