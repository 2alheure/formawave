<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Jeu;

session_start(); // On récupère la session

if (!empty($_SESSION['jeu'])) {
    // On ajoute une case à notre hsitorique, pour y stocker le jeu qui était en cours
    $_SESSION['historique'][] = $_SESSION['jeu'];
}

// On commence un nouveau jeu pour le jeu en cours
$_SESSION['jeu'] = new Jeu; 

header('location: index.php'); // On retourne sur index.php