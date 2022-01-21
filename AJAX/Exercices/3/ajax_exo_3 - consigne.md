# Une liste de courses
> On va créer un outil,  
> qui va nous aider à gérer nos listes de courses.

## Au niveau du fonctionnel
Vous avez une interface.
Celui-ci affiche des éléments et leur quantité.
Elle affiche également un bouton "ajouter" et, 
puor chaque élément affiché, un bouton "supprimer".

Lorsque le bouton "ajouter" est cliqué, 
vous affichez une modale qui permet de saisir une quantité et un nom d'élément.
Lorsque la modale est validée, l'élément est ajouté à la liste de courses
et vous l'affichez dans la `<div>` qui a pour id `liste`.

Lorsqu'un bouton "supprimer" est cliqué,
vous demandez confirmation à l'utilisateur
avant de supprimer l'élément de la liste de courses.

## Au niveau de la technique
Au premier chargement de la page, 
les données sont chargées et affichées par PHP.

Pour l'ajout et la suppression, 
tout doit passer par AJAX, avec une communication en JSON.

Utilisez la fonction fetch pour faire vos appels API.

Faites ce que vous pouvez pour suivre au maximum les bonnes pratiques.

## Bonus
Améliorez l'interface de liste de courses 
en ajoutant la possibilité de modifier un élément et/ou sa quantité.