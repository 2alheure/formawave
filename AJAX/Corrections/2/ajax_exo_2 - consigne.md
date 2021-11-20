# Un générateur d'animaux à la Google.
> On va créer un générateur de noms d'animaux,  
> un peu comme Google sur les Google Docs.

## Au niveau du fonctionnel
Vous avez un fichier HTML.
Celui-ci affiche un bouton.

Lorsque le bouton est cliqué, 
vous récupérez un animal grâce au serveur
et vous l'affichez dans la `<div>` qui a pour id `resultat`.

Attention, vous ne devez pas effacer les anciens animaux présents,
mais ajouter le nouveau à la suite.

## Au niveau de la technique
L'animal renvoyé par le serveur
le sera au format JSON.  

Aussi, lorsque vous récupèrerez le résultat par JavaScript,
il vous faudra **créer** des éléments pour le DOM.

## Bonus
Améliorez l'interface de génération d'animaux,
en indiquant quelque part le nombre d'animaux générés.