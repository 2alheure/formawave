<?php

/********* Partie 2 ****************************/
/********* D. Les fonctions ********************/
/********* III. Passage d'arguments ************/

/* 1)

	Ecrivez une fonction 
	qui calcule le nombre de jours écoulés depuis une date
	fournie en paramètre (3 paramètres : jour, mois, année)

	On pourra, pour se simplifier la vie, oublier le cas des années bissextiles

	P.S. : N'oubliez pas de checker les paramètres !
*/

function jours_ecoules_depuis(int $jour, int $mois, int $annee): int {

	if (!checkdate($mois, $jour, $annee)) return 0;

	$annee_actuelle = date('Y');
	$mois_actuel = date('m');
	$jour_actuel = date('d');

	$nb_annees = $annee_actuelle - $annee;
	$nb_mois = $mois_actuel - $mois;
	$nb_jours = $jour_actuel - $jour;

	return round($nb_annees * 365.25 + $nb_mois * 30.5 + $nb_jours);
}
