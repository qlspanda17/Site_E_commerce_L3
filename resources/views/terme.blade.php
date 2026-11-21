@extends('layouts.app')

@section('titre', 'Conditions générales')

@section('contenu')
<div class="mx-auto" style="max-width: 760px;">
<h1 class="h3 mb-4">Conditions générales – Pancha</h1>

<h2 class="h5 mt-4">1. C’est quoi, Pancha ?</h2>
<p>
    Pancha est un site fictif de fleuriste qui vend des bouquets, des plantes et des compositions florales à des clients tout aussi fictifs.  
    Tu choisis, tu cliques, et dans l’univers du projet, le bouquet est commandé.
</p>

<h2 class="h5 mt-4">2. Qui est derrière Pancha ?</h2>
<p>
    Derrière Pancha, il y a :<br>
    - Une équipe imaginaire de passionné·e·s de fleurs ;<br>
    - Un·e développeur·e (toi) ;<br>
    - Et zéro vraie donnée personnelle pour l’instant.
</p>

<h2 class="h5 mt-4">3. Les produits</h2>
<p>
    Pancha propose :<br>
    - Des bouquets romantiques, joyeux, dramatiques, « je suis désolé·e », « félicitations », etc. ;<br>
    - Des plantes d’intérieur qui survivent (presque) toutes seules ;<br>
    - Des compositions florales pour anniversaires, mariages, et autres occasions.
</p>
<p class="fst-italic text-muted">
    Les fleurs sur les photos sont parfois plus belles que dans la réalité.  
    Une rose peut décider d’être un peu plus petite, plus grande, ou légèrement différente. C’est son droit.
</p>

<h2 class="h5 mt-4">4. Les prix</h2>
<p>
    Les prix sont affichés en euros, TTC. Par exemple :<br>
    - 1 bouquet = 10 € ;<br>
    - 1 grosse composition = 50 € ;<br>
    - 1 plante quasi immortelle = 25 €.
</p>
<p>
    Les frais de livraison dépendent de la zone (ville, campagne, île isolée, etc.).
</p>

<h2 class="h5 mt-4">5. Passer une commande</h2>
<p>
    Le processus de commande :<br>
    1. Tu ajoutes des fleurs au panier ;<br>
    2. Tu vérifies le contenu du panier ;<br>
    3. Tu remplis les infos de livraison (adresse, nom, petit message) ;<br>
    4. Tu choisis le mode de livraison ;<br>
    5. Tu coches la case « J’ai lu et j’accepte les conditions générales » ;<br>
    6. Tu valides la commande.
</p>
<p class="fst-italic text-muted">
    Astuce : avant validation, afficher un résumé du type :  
    « Vous êtes sur le point d’acheter 3 bouquets. Êtes-vous sûr·e de ne pas vouloir offrir des plantes à la place ? »
</p>

<h2 class="h5 mt-4">6. Paiement</h2>
<p>
    Dans ce site fictif, le paiement peut être :<br>
    - Imaginaire (« clic et c’est bon ») ;<br>
    - Ou simulé avec Stripe / PayPal en mode test.
</p>

<h2 class="h5 mt-4">7. Livraison</h2>
<p>
    La livraison peut être :<br>
    - Instantanée (magie du code) ;<br>
    - Ou « sous 2–3 jours ouvrés » (plus réaliste).
</p>
<p>
    Si le destinataire n’est pas là, le livreur imaginaire peut :<br>
    - Laisser un mot gentil ;<br>
    - Déposer le bouquet chez le voisin fictif ;<br>
    - Ou revenir plus tard.
</p>
<p class="fst-italic text-muted">
    En cas de bouquet abîmé à la réception, le client envoie un email avec une photo très triste d’une fleur penchée.  
    Le vendeur répond : « Oh non, pauvre fleur ! On vous renvoie un nouveau bouquet immédiatement. »
</p>

<h2 class="h5 mt-4">8. Droit de rétractation</h2>
<p>
    Le client a 14 jours pour changer d’avis, tant que les fleurs ne sont pas fanées.  
    Pour ce projet fictif, on peut simplement dire que les retours sont gérés dans l’univers du site.
</p>

<h2 class="h5 mt-4">9. Garanties</h2>
<p>
    Si le bouquet ne ressemble pas du tout à la photo, c’est un problème.  
    Si la plante arrive morte, c’est clairement un problème aussi.
</p>

<h2 class="h5 mt-4">10. Données personnelles</h2>
<p>
    Les données (nom, email, adresse, etc.) sont utilisées uniquement pour :<br>
    - Gérer les commandes fictives ;<br>
    - Envoyer des emails de confirmation fictifs.
</p>
<p class="fst-italic text-muted">
    On ne vend pas les données à des aliens, ni à des concurrents intergalactiques.
</p>

<h2 class="h5 mt-4">11. Responsabilité</h2>
<p>
    Le vendeur fait de son mieux pour :<br>
    - Décrire correctement les produits ;<br>
    - Livrer dans les temps ;<br>
    - Répondre aux emails.
</p>
<p>
    Il n’est pas responsable :<br>
    - Des pannes d’Internet mondiales ;<br>
    - Des bugs de navigateur très anciens ;<br>
    - Des chats qui renversent les vases chez le client.
</p>

<h2 class="h5 mt-4">12. Modification des conditions</h2>
<p>
    On se réserve le droit de modifier ces conditions à tout moment (par exemple, si on ajoute la livraison par drone).  
    Les conditions applicables sont celles en vigueur au moment de la commande.
</p>
<p class="fst-italic text-muted">
    Traduction : si un jour on décide que les livraisons se font uniquement le mardi, ça s’applique aux nouvelles commandes, pas aux anciennes.
</p>

<h2 class="h5 mt-4">13. Droit applicable</h2>
<p>
    Ces conditions sont soumises au droit français.  
    En cas de litige, on essaie d’abord de discuter, sinon les tribunaux français sont compétents.
</p>
<p class="fst-italic text-muted">
    En cas de désaccord grave sur la couleur exacte d’une rose, on organise un vote à main levée dans l’équipe fictive.
</p>

<p class="mt-5 small text-muted">
    Dernière mise à jour : <strong>20 septembre 2026</strong>
</p>

    <a href="{{ route('welcome_index') }}" class="btn btn-outline-secondary">Retour à l'accueil</a>
</div>
@endsection
