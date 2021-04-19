# L'architecture MVC

- [L'architecture MVC](#larchitecture-mvc)
	- [Le MVC classique](#le-mvc-classique)
		- [Contrôleur frontal](#contrôleur-frontal)
		- [Contrôleurs](#contrôleurs)
		- [Modèles](#modèles)
		- [Vues](#vues)
	- [Autour du MVC](#autour-du-mvc)
		- [URL rewriting](#url-rewriting)
		- [Fonctions d'aide](#fonctions-daide)
		- [Objets génériques](#objets-génériques)

## Le MVC classique

### Contrôleur frontal
**Toutes** les requêtes passent par index.php. C'est notre *contrôleur frontal*.  
Son principal rôle est de rediriger la requête vers le contrôleur dédié. Il est donc garant du **routage** de notre application (d'où son autre nom : *router*).  
Il est également utile, puisque que tout passe par lui, pour faire toute la logique générale, pour charger tout ce qui doit l'être. Cela inclut notamment :
- La configuration de notre environnement (par un fichier `config.php` par exemple)
- La configuration de l'autoload des différents namespaces (par `spl_autoload_register`)
- La gestion des erreurs 404 dans le cas où la route n'existe pas
- La gestion de toutes les exceptions de notre code (par un grand `try {} catch {}`)

### Contrôleurs
Les *contrôleurs* représentent la **partie logique** de notre application. Ils sont également en charge de la coordination entre modèles et vues.  
Dans cet exemple, tous mes contrôleurs se trouvent dans le dossier `Controller` et font partie du namespace `Controller`.

### Modèles
Les *modèles* représentent **l'interaction avec la donnée** dans notre application. Ce sont eux qui, notamment, vont interagir avec la ase de données. Mais pas seulement.  
En effet, s'il faut aller chercher des données autre part (par exemple : appel API, lecture de fichiers, ...) c'est également de leur ressort.  
Dans cet exemple, tous mes modèles se trouvent dans le dossier `Model` et font partie du namespace `Model`. Tous les modèles étendent également `App\BaseModel` pour avoir un accès facilité à la base de données.

### Vues
Les *vues* représentent la **partie "visuelle"** de notre application. Elles sont notamment chargées de renvoyer au client le HTML représentatn la page demandée.  
Dans cet exemple, tous mes modèles se trouvent dans le dossier `View` et sont de simples fichiers `.php` qui écrivent du HTML.

## Autour du MVC

### URL rewriting
Le *router* doit recevoir le nom de la route pour pouvoir rediriger vers le bon contrôleur. Cette route est un paramètre d'URL, passé sous la forme `?route=<nom de la route>`. De ce fait, toutes nos URL ressemblent à `http://mon-site.com/index.php?route=<nom de la route>`. Cette forme n'est pas optimale : ce n'est pas une URL sémantique, et c'est assez difficile à lire.  
Pour arranger ça, j'ai intégré de la **réécriture d'URL** à cet exemple. Aussi, le fichier `.htaccess` a pour rôle d'indiquer à Apache (notre serveur) que toutes les URL de la forme `/<nom de la route>` doivent être redirigées vers `/index.php?uri=<nom de la route>`.  
Cela nous permet de récupérer une *URI*, qui aura une forme comme suit : `/route/param1/param2/...`. On n'a plus qu'à la "découper" pour en extraire les informations qui nous intéressent.

### Fonctions d'aide
On a souvent des opérations répétitives qui reviennent dans nos contrôleurs que l'on aimerait factoriser dans une fonction. Ou bien des syntaxes particulièrement lourdes que l'on aimerait abbréger avec une fonction.  
Ces fonctions, que j'appelle *fonctions d'aide*, sont utiles qu'importe le contrôleur appelé. Aussi, on désire les avoir partout, et on va donc les inclure dans notre *contrôleur frontal* pour les mettre à disposition partout.  
Ces fonctions sont, pour cet exemple : 
- `env('nom')` : permet de récupérer une variable d'environnement par son nom (raccourci syntaxique pour `$_ENV['nom']`)
- `view('nom', [parametres])` : permet d'appeler une vue située dans le dossier `View` (raccourci syntaxique pour `include __DIR__ . '/../View/nom.php';`)
- `error('message', code)` : permet d'appeler la vue `errors/default.php` avec un message personnalisé et un code d'erreur HTTP. Met également fin au processus (raccourci syntaxique pour `view(errors/default', ['message' => message]);`)
- `error404('message')` : permet d'appeler la vue `errors/404.php` avec un message personnalisé. Met également fin au processus (raccourci syntaxique pour `view(errors/404', ['message' => message]);`)
- `error500('message')` : permet d'appeler la vue `errors/500.php` avec un message personnalisé. Met également fin au processus (raccourci syntaxique pour `view(errors/500', ['message' => message]);`)
- `dd(variable)` : affiche les informations de debug d'une variable. Met également fin au processus (raccourci syntaxique pour `print_r(variable);`)
- `uriSegment(x)` : permet de récupérer le "x-ième" segment de l'URI
- `route()` : permet de récupérer le nom de la route courante (raccourci syntaxique pour `uriSegment(1);`)
- `url('uri')` : permet de récupérer une URL vers l'URI demandée (raccourci syntaxique pour `env('BASE_URL') . uri;`)
- `currentUrl()` : permet de récupérer l'URL courante
Ces *fonctions d'aide* seront stockées dans le dossier `helpers` et le fichier `helpers/main.php` sera automatiquement chargé dans le *contrôleur frontal*.

### Objets génériques
On risque d'avoir besoin d'objets qui reviendront souvent. Ces objets concerneront, par exemple, la base de données, ou bien un service générique comme l'envoi de mail, ou encore des éléments métiers récurrents. Les exceptions de notre application pourront également s'y trouver.  
Ces objets (ou plutôt leurs classes) seront stockés dans le dossier `App` et placé sous le namespace `App`.