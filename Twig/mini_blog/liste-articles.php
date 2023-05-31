<?php

use Twig\TwigFilter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';
require_once 'articles.php';

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$filtre = new TwigFilter('uneLettreSurDeux', 'uneLettreSurDeux');

function quiFaitCeci(string $string): string {
    return 'Elle a fait ceci : ' . $string . ' !';
}

$twig->addFilter($filtre);

echo $twig->render('liste-articles.html', [
    'articles' => $articles
]);
