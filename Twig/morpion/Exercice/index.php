<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Jeu;

session_start(); // On récupère la session

// On s'assure qu'il y a toujours un jeu dans la session
if (empty($_SESSION['jeu'])) {
    // S'il n'y en a pas on en crée un
    $_SESSION['jeu'] = new Jeu;
}

$jeu = $_SESSION['jeu'];

if (isset($_GET['x']) && isset($_GET['y'])) {
    // Si on a bien nos coordonnées de jeu, on joue le coup
    $jeu->placerCoup($_GET['x'], $_GET['y']);
}

$jeu->sAfficher(); // On affiche le jeu
