# Consignes

## 1. Arranger le code
Vous devez, à partir de ce code, créez une autre version de celui-ci, mais *allégée* :
- Moins de copié collé
- Fichiers mieux organisés
- Code *factorisé* (Si du code a 90 % de copié-collé, trouvez un moyen de l'arranger, avec une fonction, une variable, une boucle, ...)

> On appelle cette opération "d'amélioration" un __refactor__.

Vous avez le droit de créer des fichiers, des fonctions, des boucles, des conditions, des variables, ...  
En bref, tout ce dont vous avez besoin !

## 2. Créez une page en plus
Après amélioration du code, testons voir si c'est plus simple.  
Créez une autre page `amerique.php` et affichez les horloges de New York, Vancouver et Mexico City.

# Corrections

## 1. Des fichiers séparés
Ma première étape a été de créer deux fichiers, `header.php` et `footer.php`.  
Dans ces fichiers j'ai rangé, respectivement, l'entête et le pied de page de chaque page, qui étaient très similaires.  
Comme le nom de chaque page était différent, j'ai incorporé une variable à cet endroit pour pouvoir l'afficher correctement.

## 2. Une fonction pour afficher les cards
Je me suis rendu compte que 90 % du code de chaque card était semblable à celui des autres cards.  
J'ai donc créé une fonction pour afficher une card (dans `fonctions.php`).  
J'ai mis une variable aux endroits changeant, qui proviendrait des paramètres de ma fonction.  
Il ne me restait alors plus qu'à appeler cette fonction à chaque card que j'affichais.

## 3. Une variable pour tout stocker
Je me suis rendu compte que sur chaque page je faisais la même chose.  
J'ai donc stocké toutes les informations de tous les continents dans une variable `$continents`, un tableau associatif (dans `variable.php`).  
J'ai ensuite utilisé cette variable dans chacune de mes pages pour faire une boucle pour afficher toutes les horloges, pour afficher le titre des pages et tous mes liens de navigation dans mon `header.php`.

## 4. Une fonction pour afficher un continent
Mes pages étaient encore **très** semblables.  
J'ai donc décidé de faire une fonction pour afficher un continent entier (dans `fonctions.php`).  
Il ne me restait plus qu'à remplacer mes pages pour utiliser ma fonction à la place.

## 5. Ajouter une page
Après toutes ces modifications, pour ajouter une page, c'est très simple :
- Créer le fichier (`amerique.php`)
- Dans le fichier créé, inclure `fonctions.php`
- Créer une entrée dans la variable `$continents` (dans `variable.php`)
- Dans le fichier créé, appeler la fonction pour afficher le continent