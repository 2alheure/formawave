<?php

const BASE_URL = 'http://localhost/Formawave/Cours/PHP7/MVC/index.php';
const DOSSIER_CONTROLLERS = __DIR__ . '/src/controllers';
const DOSSIER_MODELS = __DIR__ . '/src/models';
const DOSSIER_VIEWS = __DIR__ . '/views';
const DOSSIER_ASSETS = __DIR__ . '/assets';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'test_annuaire_telephonique';

// J'inclus mes fonctions qui sont utilisées partout
require __DIR__ . '/functions/functions.php';


require __DIR__ . '/SimpleOrm.class.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

if ($conn->connect_error)
	die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

SimpleOrm::useConnection($conn, DB_NAME);

// Je récupère TOUTES les requêtes

/**
 * URL VERSION 1
 */
// Nos URLs : http://localhost/XXX/YYY/index.php?route=ceci-cela
if (isset($_GET['route'])) {
	$route = $_GET['route'];

	if ($route == 'ajouter-contact') {
		require DOSSIER_CONTROLLERS . '/contact_controller.php';
		ajouter_tel();

	} elseif ($route == 'ajouter-contact-handler') {
		require DOSSIER_CONTROLLERS . '/contact_controller.php';
		ajouter_tel_handler();

	} elseif ($route == 'liste-contacts') {
		require DOSSIER_CONTROLLERS . '/contact_controller.php';
		afficher_les_contacts();

	} elseif ($route == 'supprimer-contact') {
		require DOSSIER_CONTROLLERS . '/contact_controller.php';
		supprimer_un_contact();

	} elseif ($route == 'home') {
		require DOSSIER_VIEWS . '/home.html.php';

	} else {
		erreur404();
	}
} else {
	require DOSSIER_VIEWS . '/home.html.php';
}


/** 
 * Pour créer une "page" :
 * 
 * - Vous déclarez l'URL de la page dans le router
 * - Vous ajoutez une fonction dans un contrôleur (ou bien vous créez un contrôleur avec une fonction)
 * - Vous créez le modèle (ou bien vous l'appelez s'il existe déjà)
 * - Vous créez la vue (ou bien vous l'appelez si elle existe déjà)
 */
