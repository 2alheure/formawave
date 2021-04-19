<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* I. Conditions ***********************/
/********* a. Switch ***************************/

// Déclarez une variable `mois` et affectez-lui le nom d'un mois
$mois = 'janvier';

// Affichez la phrase suivante, remplie avec les bonnes valeurs
// "Le mois de {mois} comporte {nombre} jours."
switch ($mois) {
    case 'janvier':
        $nb_jours = 31;
        break;
    case 'février':
        $nb_jours = 28;
        break;
    case 'mars':
        $nb_jours = 31;
        break;
    case 'avril':
        $nb_jours = 30;
        break;
    case 'mai':
        $nb_jours = 31;
        break;
    case 'juin':
        $nb_jours = 30;
        break;
    case 'juillet':
        $nb_jours = 31;
        break;
    case 'août':
        $nb_jours = 31;
        break;
    case 'septembre':
        $nb_jours = 30;
        break;
    case 'octobre':
        $nb_jours = 31;
        break;
    case 'novembre':
        $nb_jours = 30;
        break;
    case 'décembre':
        $nb_jours = 31;
        break;
}

/* On peut aussi écrire ce switch comme suit :

switch ($mois) {
    case 'février':
        $nb_jours = 28;
        break;

    case 'janvier':
    case 'mars':
    case 'mai':
    case 'juillet':
    case 'août':
    case 'octobre':
    case 'décembre':
        $nb_jours = 31;
        break;

    case 'avril':
    case 'juin':
    case 'septembre':
    case 'novembre':
        $nb_jours = 30;
        break;
}

Puisque tant qu'on ne rencontre pas l'instruction `break`, 
l'interpréteur ne sort pas du switch.

Les autres `case` ne posent aucun souci à l'interpréteur.
*/

echo "Le mois de $mois comporte $nb_jours jours. <br />";



// Imaginez une solution pour traiter le cas particulier des années bissextiles
$mois = 'février';

switch ($mois) {
    case 'février':
        /**
         * Les années bissextiles ont lieu toutes les années multiples de 4 mais pas de 100
         * Ainsi que les années multiples de 400
         * Plus d'informations sur Wikipédia
         * https://fr.wikipedia.org/wiki/Ann%C3%A9e_bissextile#R%C3%A8gle_actuelle
         */

        $d = date('Y'); // On récupère l'année
        if (($d % 4 == 0 && $d % 100 != 0) || $d % 400 == 0) $nb_jours = 29;
        else $nb_jours = 28;
        break;

    case 'janvier':
    case 'mars':
    case 'mai':
    case 'juillet':
    case 'août':
    case 'octobre':
    case 'décembre':
        $nb_jours = 31;
        break;

    case 'avril':
    case 'juin':
    case 'septembre':
    case 'novembre':
        $nb_jours = 30;
        break;
}

echo "Le mois de $mois comporte $nb_jours jours. <br />";

// Prévoyez une erreur pour le cas ou le mois ne contient pas un mois de l'année
$mois = 'erreur';

switch ($mois) {
    case 'février':
        $d = date('Y');
        if (($d % 4 == 0 && $d % 100 != 0) || $d % 400 == 0) $nb_jours = 29;
        else $nb_jours = 28;
        break;

    case 'janvier':
    case 'mars':
    case 'mai':
    case 'juillet':
    case 'août':
    case 'octobre':
    case 'décembre':
        $nb_jours = 31;
        break;

    case 'avril':
    case 'juin':
    case 'septembre':
    case 'novembre':
        $nb_jours = 30;
        break;

    default:
        die('Une erreur a dû survenir dans le code...!');
        // La fonction `die` tue le processus et met donc fin à l'exécution du script
        // En renvoyant un message d'erreur
}

echo "Le mois de $mois comporte $nb_jours jours. <br />";
