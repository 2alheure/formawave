<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/
/********* d. foreach **************************/

// Déclarez une variable `tableau` et affectez-lui un tableau associatif

$tableau = [
	'clef' => 'valeur',
	true,
	'tableau' => [
		1,
		2,
		3
	]
];


/* 
	Affichez tous les éléments du tableau 
	comme le feraient les fonctions `print_r` ou `var_dump`
	(donc avec les clefs et les valeurs)
	ATTENTION : pas le droit de les écrire une par une
	et si le tableau change, le code doit s'adapter sans être réécrit
*/

function print_array(array $tableau) {
	foreach ($tableau as $clef => $element) {
		if (is_array($element)) {
			// Si $element est un tableau
			echo '[' . $clef . '] => ';
			print_array($element);
		} else {
			// Sinon ($element n'est pas un tableau)
			echo '[' . $clef . '] => ' . $element;
		}
	}
}


foreach ($tableau as $clef => $element) {
	if (is_array($element)) {
		// Si $element est un tableau
		echo '[' . $clef . '] => Un tableau';
	} else {
		// Sinon ($element n'est pas un tableau)
		echo '[' . $clef . '] => ' . $element;
	}
}
