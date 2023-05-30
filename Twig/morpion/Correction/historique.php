<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

require_once __DIR__ . '/vendor/autoload.php';

session_start(); // On récupère la session

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, [
    'debug' => true,
    'cache' => false
]);
$twig->addExtension(new DebugExtension);

try {
    echo $twig->render('historique.html', [
        'sess' => $_SESSION, // Je passe toute ma session, pour pouvoir tout afficher
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}
