<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// 1 : on appelle le vendor/autoload
require_once 'vendor/autoload.php';
require_once 'articles.php';

// 2 : on instancie Twig
$loader = new FilesystemLoader('templates'); // PAramètre = nom du dossier où se trouvent les templates
$twig = new Environment($loader);

// 3 : On procède au rendu de notre / nos template(s)
echo $twig->render('home.html', [
    'articles' => $articles
]);
