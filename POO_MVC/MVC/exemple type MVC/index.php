<?php
// On utilise la fonction PHP `spl_autoload_register` 
// pour automatiquement aller chercher les classes qui nous intéressent
spl_autoload_register(function ($class) {
	// On remplace les "\" par des "/" et on va chercher le fichier associé à la classe
	// Ex : Foo\Test => Foo/Test.php
	require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

use App\Exception\NotFoundException;
use App\Exception\ServerErrorException;

@include 'helpers/main.php';	// Avec le @ on évite d'afficher une erreur si le fichier existe pas

// On fait un gros try ... catch 
// Pour récupérer toutes les exceptions qui ne seraient pas gérées autrement
try {

	if (!is_file('config.php')) throw new Exception('Il manque le fichier config.php');
	include 'config.php';

	// On construit notre environnement
	$_ENV = array_merge($_ENV, $config);

	// On construit le tabeau URI
	if (!empty($_GET['uri'])) $_ENV['CURRENT_URI'] = explode('/', $_GET['uri']);
	else $_ENV['CURRENT_URI'] = [];

	switch (route()) {
		case '':
		case 'home':
		case 'accueil':
			// Les URI '/', '/home' et '/accueil' renvoient toutes 3 à la page d'accueil

			// On instancie notre controller
			$controller = new Controller\StaticPages();
			// On appelle la méthode qui gère la page
			$controller->home();
			break;

		case 'about':
		case 'a-propos':
			// Les URI '/about' et '/a-propos' renvoient toutes 2 à la page about

			// On instancie notre controller
			$controller = new Controller\StaticPages();
			// On appelle la méthode qui gère la page
			$controller->about();
			break;

		case 'test-bdd':
			// On instancie notre controller
			$controller = new Controller\TestsBDD();
			
			if (!empty($id = uriSegment(1))) {
				// S'il y a un autre segment d'URI que la route
				// On appelle la méthode qui gère la page d'affichage d'un truc
				$controller->printOne($id);
			} else $controller->printAll();

			break;

		default:
			// Si aucune route ne correspond, on jette une exception
			throw new NotFoundException();
	}
} catch (Exception $e) {
	// Si l'exception est de type NotFoundException
	// On renvoie une erreur 404
	if ($e instanceof NotFoundException) error404($e->getMessage());

	// Si l'exception est de type ServerErrorException
	// On renvoie une erreur 500
	if ($e instanceof ServerErrorException) error500($e->getMessage());

	// Sinon on renvoie une erreur par défaut
	error($e->getMessage(), $e->getCode());
}
