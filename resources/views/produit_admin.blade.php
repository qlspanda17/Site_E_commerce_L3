<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    
     <form  method="post" action="{{ url('/produit_admin') }}">
        @csrf

                                        
       <input type="text" name="nom" />
        <label class="form-label" for="nom">Votre nom</label>

       <input type="description" name="description" />
        <label class="form-label" for="description">Description</label>

         <input type="prix" name="prix" />
        <label class="form-label" for="prix"> Prix</label>

        <input type="stock" name="stock" />
        <label class="form-label" for="stock"> stock</label>

        


                                        
                                    
                                           
                                       

        <div>
            <button type="submit" >Envoyez </button>

            <a id="retour" href="{{ url('/') }}">Retour</a>
        </div>





</body>


</html>