<?php

/********* Partie 2 ****************************/
/********* C. Les structures *******************/
/********* II. Boucles *************************/
/********* d. foreach **************************/

// Déclarez une variable `tableau` et affectez-lui un tableau qui contient des nombres
$tab = [52, 3, 4, 72, 18];

/**
 * 1/
 * Calculez et affichez 
 * la somme de tous les nombres 
 * du tableau
 */
$somme = 0;
foreach ($tab as $nombre) {
	$somme += $nombre; // $somme = $somme + $nombre; 
	// "On augmente la valeur de $somme de la valeur de $nombre"
}

echo $somme . '<br>';


/**
 * 2/
 * Même exercice, 
 * mais cette fois-ci on additionne 
 * les nombres aux clefs paires
 * et on soustrait les nombres aux clefs impaires
 */
$somme = 0;
foreach ($tab as $clef => $nombre) {
	if ($clef % 2 == 0) { // Si la clef est paire
		$somme += $nombre; // $somme = $somme + $nombre; 
		// "On augmente la valeur de $somme de la valeur de $nombre"
	} else { // Sinon (= la clef est impaire)
		$somme -= $nombre;// $somme = $somme - $nombre; 
		// "On diminue la valeur de $somme de la valeur de $nombre"
	}
}

echo $somme . '<br>';
