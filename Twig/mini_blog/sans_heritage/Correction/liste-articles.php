<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';
require_once 'articles.php';

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

echo $twig->render('liste-articles.html', [
    'articles' => $articles
]);
