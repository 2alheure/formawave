<?php

/** Fin de la partie 2 sur le langage **/

// Exercice : écrire une fonction de tri

// $tableau contient des nombres
$tableau = array(1, 2, 3, 4, 5, 5, 5, 7, 8, 12, 14, 42, 1337, 18, 6357, 61384, 973, 16897);

// On mélange le tableau
shuffle($tableau);

// A présent, on appelle notre fonction de tri (définie plus bas)
// Pour trier notre tableau (et on vérifie qu'il est bien trié)
var_dump(trier($tableau));


/**
 * Complétez la fonction ci-dessous
 */
function trier($tableau) {
	return $tableau;
}
