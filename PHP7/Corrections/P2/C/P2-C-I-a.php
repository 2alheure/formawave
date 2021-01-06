<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* I. Conditions ***********************/
/********* a. If else **************************/

// Nous allons faire un peu de grammaire
// Déclarez une variable `masculin`, et passez-lui une valeur booléenne
$masculin = true;

// Déclarez une variable `nombre` et affectez-lui un nombre entier
$nombre = 42;

// Ecrivez les textes qui suivent
// en accordant en genre et en nombre 
// grâce aux variables `masculin` et `nombre`

// "Je suis marié(e) à Lucile. Ensemble, nous avons {nombre} enfant(s)."
/**
 * Ici nous allons utiliser "la méthode bourrin".
 */
if ($masculin) {
    echo 'Je suis marié à Lucile.';
} else {
    echo 'Je suis mariée à Lucile.';
}

if ($nombre >= 2) {
    echo "Ensemble, nous avons $nombre enfants.";
} else {
    echo "Ensemble, nous avons $nombre enfant.";
}

// "Il y a {nombre} anima[l / ux] dans ce zoo. C'est [peu / beaucoup] ! Je suis étonné(e) !"
/**
 * Ici on va un peu abréger en retirant les accolades inutiles.
 */
if ($nombre >= 2) echo "Il y a $nombre animaux dans ce zoo.";
else "Il y a $nombre animal dans ce zoo.";

if ($nombre > 40) echo 'C\'est beaucoup !';
else echo 'C\'est peu !';

if ($masculin) echo 'Je suis étonné !';
else echo 'Je suis étonnée !';

// "J'ai mangé {nombre} chocolat(s) de l'avent en {nombre - 10} jour(s), car j'en ai mangé plusieurs par jour car je suis gourmand(e)."
/**
 * Ici on va utiliser les ternaires
 */
echo 'J\'ai mangé ' . $nombre . ' chocolat' . ($nombre >= 2 ? 's' : '') . ' de l\'avent en '
    . ($nombre - 10) . ' jour' . ($nombre - 10 >= 2 ? 's' : '') . ','
    . 'car j\'en ai mangé plusieurs par jour '
    . 'car je suis gourmand' . ($masculin ? '' : 'e') . '.';
