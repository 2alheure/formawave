# Morpion (Tic Tac Toe)

## Consignes
Créez un jeu de Morpion à l'aide des technologies suivantes :
- HTML
- CSS
- PHP
- Twig

### Particularité de l'exercice
Le but du module étant de vous familiariser avec Twig, tout le reste vous est fourni.  
Aussi, toute la logique du Morpion est déjà présente dans les différentes classes données.  
Il ne vous reste plus "que" l'affichage à faire.  
Pour vous faciliter un peu la vie, vous avez le droit d'utiliser un framework CSS.
  
En résumé vous n'avez que 5 choses à faire :
- Remplir le template `base.html`
- Remplir le template `jeu.html`
- Remplir le template `historique.html`
- Remplir la méthode `sAfficher` de la classe `Jeu`
- Remplir la fin du fichier `historique.php`

## Organisation du projet
### Les fichier
- Le dossier `classes` contient toute la logique du jeu.
- Le dossier `templates` contient l'ensemble des templates (que vous aurez pour objectif de remplir).
- Les 4 fichier `.php` correspondent aux fonctionnalités du projet
- Les fichiers `composer.lock` et `composer.json` sont là pour installer toutes les dépendances
- Le `.gitignore` permet de ne pas stocker le dossier `vendor/` sur GitHub (un peu trop volumineux)

### Fonctionnement du projet
Le projet comprend 3 "pages" (3 fonctionnalités) :
- `index.php` : Le jeu en lui-même, à savoir la partie en cours
- `historique.php` : L'ensemble des parties réalisées et leur état
- `new_game.php` : Pour commencer une nouvelle partie

Toutes les informations sont stockées en session. Aussi, pour vider la session, le fichier `logout.php` est présent.

### Conseils pour votre travail
1. Commencez par prendre en main et comprendre (grossièrement) les fichiers fournis.
2. Faites les **appels** des différents templates pour les différentes pages (dans la méthode `sAfficher` de la classe `Jeu` et dans le fichier `historique.php`)
3. Créez votre layout (`base.html`)
4. Faites un menu de navigation
5. Essayez de comprendre et de dessiner (oui oui) schématiquement comment sont stockées les informations du jeu en cours dans la session.
6. Remplissez le template `jeu.html` (affichez le jeu en cours)
7. Sur chaque case de votre plateau de jeu, mettez un lien qui permet de jouer un coup (il vous faudra comprendre le fonctionnement de la <u>superglobale $_GET</u>)
8. Gérez l'affichage cas de victoire / défaite / match nul et les erreurs
9. Essayez de comprendre et de dessiner (eh oui toujours) schématiquement comment sont stockées les informations de l'historique dans la session.
10. Remplissez le template `historique.html` (affichez l'historique)

Sachez que vous avez accès à des fonctions comme `dump` et `dd` (*dump & die*) pour votre débuggage PHP.