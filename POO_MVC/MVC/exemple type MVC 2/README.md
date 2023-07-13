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
      - [Les Exception](#les-exception)
      - [La Config](#la-config)
      - [Les sessions flash](#les-sessions-flash)

## Le MVC classique

### Contrôleur frontal
**Toutes** les requêtes passent par index.php. C'est notre *contrôleur frontal*.  
Son principal rôle est de rediriger la requête vers le contrôleur dédié. Il est donc garant du **routage** de notre application (d'où son autre nom : *router*).  
Il est également utile, puisque que tout passe par lui, pour faire toute la logique générale, pour charger tout ce qui doit l'être. Cela inclut notamment :
- La configuration de notre environnement (par la classe `App\Config`)
- La configuration de l'autoload des différents namespaces (par `spl_autoload_register` et, pour composer, `vendor/autoload.php`)
- La gestion des erreurs 404 dans le cas où la route n'existe pas
- La gestion de toutes les exceptions de notre code (par un grand `try {} catch {}`)

### Contrôleurs
Les *contrôleurs* représentent la **partie logique** de notre application. Ils sont également en charge de la coordination entre modèles et vues.  
Dans cet exemple, tous mes contrôleurs se trouvent dans le dossier `src/Controllers` et font partie du namespace `Controllers`.

### Modèles
Les *modèles* représentent **l'interaction avec la donnée** dans notre application. Ce sont eux qui, notamment, vont interagir avec la ase de données. Mais pas seulement.  
En effet, s'il faut aller chercher des données autre part (par exemple : appel API, lecture de fichiers, ...) c'est également de leur ressort.  
Dans cet exemple, tous mes modèles se trouvent dans le dossier `src/Models` et font partie du namespace `Models`. Tous les modèles étendent également `Models\BaseModel` pour avoir un accès facilité à la base de données.  
Par ailleurs, le modèle de base propose une connexion à la BDD, et règle le "mode de fetch" sur `PDO::FETCH_OBJ` (objet) par défaut.

### Vues
Les *vues* représentent la **partie "visuelle"** de notre application. Elles sont notamment chargées de renvoyer au client le HTML représentatn la page demandée.  
Dans cet exemple, tous mes modèles se trouvent dans le dossier `src/views` et sont de simples fichiers `(.html).php` qui écrivent du HTML.

## Autour du MVC

### URL rewriting
Le *router* doit recevoir le nom de la route pour pouvoir rediriger vers le bon contrôleur. Cette route est un paramètre de l'URL, passé sous la forme `/<nom de la route>`. De ce fait, toutes nos URL ressemblent à `http://mon-site.com/<nom de la route>`.  
Dans un site un peu plus conséquent, on utiliserait un fichier `.htaccess` pour gérer ça. Là, on va se contenter d'exploiter le comportement natif des serveurs qui est de rediriger toute requête formulée sans nom de fichier vers `index.php`.  
On peut en profiter pour récupérer l'URI (la partie `/<nom de la route>`) grâce à la variable superglobale `$_SERVER['PATH_INFO']`.

### Fonctions d'aide
On a souvent des opérations répétitives qui reviennent dans nos contrôleurs que l'on aimerait factoriser dans une fonction. Ou bien des syntaxes particulièrement lourdes que l'on aimerait abbréger avec une fonction.  
Ces fonctions, que j'appelle *fonctions d'aide*, sont utiles qu'importe le contrôleur appelé. Aussi, on désire les avoir partout, et on va donc les inclure dans notre *contrôleur frontal* pour les mettre à disposition partout.  
Ces fonctions sont, pour cet exemple : 
- `redirect('url')` : redirige l'utilisateur vers l'URL spécifiée.
- `is_connected()` : indique si l'utilisateur est connecté ou non.
- `user('prop')` : permet de récupérer propriété de l'utilisateur connecté (raccourci syntaxique pour `$_SESSION['user']->prop`). Peut aussi s'utiliser sans argument pour récupérer l'utilisateur entier.  
- `env('nom')` : permet de récupérer une variable d'environnement par son nom (raccourci syntaxique pour `Config::nom`).
- `error('message', code)` : raccourci syntaxique pour `throw new Exception('message', code);`.
- `error403('message')` : raccourci syntaxique pour `throw new AccessDeniedException('message');`.
- `error404('message')` : raccourci syntaxique pour `throw new NotFoundException('message');`.
- `asset('nom')` : permet de récupérer une URL vers l'asset spécifié (raccourci syntaxique pour `Config::BASE_URL . '/assets/' . nom`) . 
- `url('/uri')` : permet de récupérer une URL vers l'URI demandée (raccourci syntaxique pour `Config::BASE_URL . '/uri'`) . 
- `view('name')` : permet de récupérer le chemin du fichier d'une vue (raccourci syntaxique pour `views/name.html.php`).
- `write_log('message', 'type')` : écrit un message dans les logs. Le message sera catégorisé comme `TYPE` (par exemple : ERROR, DEBUG, ...).
- `upload([file], 'directory')` : réalise l'upload d'un fichier (donné par `$_FILES`) dans le dossier spécifié. Renvoie le nom du nouveau fichier, généré par la fonction.  
  
Ces *fonctions d'aide* seront stockées dans le dossier `src/helpers` et le fichier `src/helpers/main.php` sera automatiquement chargé dans le *contrôleur frontal*.

### Objets génériques
On risque d'avoir besoin d'objets qui reviendront souvent. Ces objets concerneront, par exemple, la base de données, ou bien un service générique comme l'envoi de mail, ou encore des éléments métiers récurrents. Les exceptions de notre application pourront également s'y trouver.  
Ces objets (ou plutôt leurs classes) seront stockés dans le dossier `App` et placé sous le namespace `App`.

#### Les Exception
Vous trouverez dans ce projet deux exceptions personnalisées :
- `NotFoundException`, pour représenter les erreurs 404.
- `AccessDeniedException`, pour représenter les erreurs 403.  
Ces exceptions font partie du namespace `App\Exceptions` et sont dans le dossier `src/App/Exceptions`.

#### La Config
Les variables d'environnement sont stockées dans `App\Config`. Elles sont accessibles globalement.

#### Les sessions flash
Une fonctionnalité pratique est de permettre de stocker des petites informations dans la session pour les transmettre d'une page à une autre. Ces informations sont ensuite détruites. Par exemple : les message d'alerte.  
Ce comportement s'appelle "Session Flash". La classe `App\FlashSession` vous propose de vous aider à les gérer, notamment via des méthodes (statiques). Un *helper* (`session_flash.php`) est également disponible pour proposer des raccourcis syntaxiques :
- `flashes('type')` : Raccourci pour `FlashSession::getAll()` (si pas de type donné) ou bien `FlashSession::getType('type')`.
- `add_flash('type', 'message')` : Raccourci syntaxique pour `FlashSession::add('type', 'message')`.
- `flash_style('type')` : Raccourci syntaxique pour `FlashSession::getFullStyle('type')`.
- `flash_name('type')` : Raccourci syntaxique pour `FlashSession::getName('type')`.