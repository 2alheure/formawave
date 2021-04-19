<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/
/********* c. do while *************************/

// Déclarez une variable `limite` et affectez-lui un nombre 
// (Un conseil : dépassez pas trop le million ;-))
$limite = 1500;

// Affichez tous les termes de la suite de Fibonacci
// qui sont inférieurs à `limite`
$precedent = 0;
$actuel = 1;

do {
    echo $actuel.'<br />';
    $save = $actuel;
    $actuel += $precedent;
    $precedent = $save;
} while ($actuel < $limite);