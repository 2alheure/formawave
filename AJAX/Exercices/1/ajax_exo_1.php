<?php

$nombres = range(1, 50);    // On génère un tableau avec les nombres de 1 à 50
shuffle($nombres);  // On mélange le tableau
$selection = array_slice($nombres, 0, 5);   // On ne sélectionne que 5 nombres


// var_dump($selection);

/**
 * On écrit ici le PHP
 * nécessaire à l'exercice
 */
