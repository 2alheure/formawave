<?php

/********* Partie 2 ********************************/
/********* D. Les fonctions ************************/
/********* III. Déclaration de fonction ************/

/* 1)
	Écrivez une fonction 
	qui prend 10 nombres et renvoie leur moyenne.
*/
function moyenne(
	int|float $nombre1,
	int|float $nombre2,
	int|float $nombre3,
	int|float $nombre4,
	int|float $nombre5,
	int|float $nombre6,
	int|float $nombre7,
	int|float $nombre8,
	int|float $nombre9,
	int|float $nombre10
): int|float {
	return ($nombre1 +
		$nombre2 +
		$nombre3 +
		$nombre4 +
		$nombre5 +
		$nombre6 +
		$nombre7 +
		$nombre8 +
		$nombre9 +
		$nombre10) / 10;
}

echo moyenne(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

/* 2)
	Écrivez une fonction
	qui prend 10 notes et indique si l'élève a son diplôme ou non.
	(moyenne >= 10)
*/
function est_admis(
	int|float $nombre1,
	int|float $nombre2,
	int|float $nombre3,
	int|float $nombre4,
	int|float $nombre5,
	int|float $nombre6,
	int|float $nombre7,
	int|float $nombre8,
	int|float $nombre9,
	int|float $nombre10
): bool {
	$moyenne = moyenne($nombre1, $nombre2, $nombre3, $nombre4, $nombre5, $nombre6, $nombre7, $nombre8, $nombre9, $nombre10);
	$resultat = $moyenne >= 10;
	return $resultat;
}
