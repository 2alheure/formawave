<?php

/** Fin de la partie 2 sur le langage **/

// Exercice : écrire une fonction de tri

// $tableau contient des nombres
$tableau = array(1, 2, 3, 4, 5, 5, 5, 7, 8, 12, 14, 42, 1337, 18, 6357, 61384, 973, 16897);

// On mélange le tableau
shuffle($tableau);

// A présent, on appelle notre fonction de tri (définie plus bas)
// Pour trier notre tableau (et on vérifie qu'il est bien trié)
echo '<pre>';
print_r(trier($tableau));
echo '</pre>';


/**
 * Complétez la fonction ci-dessous
 */
/**
 * Version : tri par sélection
 */
/*
 function trier(array $tableau): array {

	$tableau_trie = [];

	$nombre_le_plus_petit = null;
	$clef_du_nombre_le_plus_petit = null;

	while (count($tableau) > 0) {
		// Tant que mon tableau a encore des cases

		// Je cherche son nombre le plus petit
		foreach ($tableau as $clef => $nombre) {
			if ($nombre_le_plus_petit === null || $nombre < $nombre_le_plus_petit) {
				$nombre_le_plus_petit = $nombre;
				$clef_du_nombre_le_plus_petit = $clef;
			}
		}

		unset($tableau[$clef_du_nombre_le_plus_petit]); // On enlève le nombre de l'ancien tableau
		$tableau_trie[] = $nombre_le_plus_petit; // On met le nombre dans le nouveau tableau

		$nombre_le_plus_petit = null;
		$clef_du_nombre_le_plus_petit = null;
	}

	return $tableau_trie;
}
*/

/**
 * Version : tri à bulle
 */
function trier(array $tableau): array {

	$taille = count($tableau);
	$max_de_la_boucle = $taille - 2;

	for ($j = 0; $j < $max_de_la_boucle + 1; $j++) {
		for ($i = 0; $i <= $max_de_la_boucle; $i++) {
			if ($tableau[$i] > $tableau[$i + 1]) {
				// Si la case actuelle est plus grande que la suivante
				// On échange les cases
				$souvenir = $tableau[$i];
				$tableau[$i] = $tableau[$i + 1];
				$tableau[$i + 1] = $souvenir;
			}
		}
	}

	return $tableau;
}
