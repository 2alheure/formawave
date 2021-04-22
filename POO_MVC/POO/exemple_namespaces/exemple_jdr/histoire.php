<?php

/**
 * "Il était une fois..."
 * 
 * A l'aide des différentes classes que vous allez écrire tout au long du module
 * construisez une histoire.
 * 
 * Cette histoire ne devra s'écrire sans aucun appel à echo, print, ... dans ce fichier
 * 
 * Faites évoluer cette histoire au fur et à mesure que le module avance.
 * 
 * (On n'est pas à une faute de français près. 
 * Il se peut que tout ne s'accorde pas exactement comme voulu, ce n'est pas très grave...
 * Mais essayez de faire au mieux =p)
 */
function chercherFQCN($fqcn) {
    // FQCN : a\b\c\d
    // Mes fichiers : a/b/c/d.php

    $tableau = explode('\\', $fqcn);      // ['a', 'b', 'c', 'd']

    $fichier = implode('/', $tableau) . '.php'; // 'a/b/c/d.php';

    require_once $fichier;
}

spl_autoload_register('chercherFQCN');

use Characters\Archer;
use Characters\Personnage;

$archer = new Archer;
$archer->pseudo = 'Guillaume Tell';
$bandit = new Personnage;
$bandit->pseudo = 'Bandit manchot';

$archer->flecheEnflammee($bandit);
