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


function nbJoursDepuis(int $jour, int $mois, int $annee): int {
	// On vérifie qu'on a eu une date valide
	if (!checkdate($mois, $jour, $annee)) die('Une erreur s\'est produite.');

	// On calcule le nombre d'année entières écoulées
	$annees_completes = date('Y') - $annee;
	// Ce qui nous fait un certain nombre de jours
	$retour = $annees_completes * 365;

	// On ajoute le nombre de jours écoulés dans l'année courante
	$retour += date('z');

	// On retire le nombre de jours écoulés dans l'année de départ
	// Donc on crée une date que l'on formate ensuite
	$retour -= date_format(date_create_from_format('d/m/Y', $jour . '/' . $mois . '/' . $annee), 'z');

	// On renvoie le résultat
	return $retour;
}


// Alternative
/*
function jours_ecoules_depuis(int $jour, int $mois, int $annee): int {
	if (!checkdate($mois, $jour, $annee)) die('Date non valide');

	$ajd_jour = date('z'); // Numéro du jour actuel
	$ajd_annee = date('Y'); // Année actuelle

	// Nombre d'années entière + le nombre de jours de l'année actuelle
	$nb_jours = ($ajd_annee - $annee) * 365 + $ajd_jour;

	// Retirer nombre de jours de l'année de départ
	$nb_jours_depart = $jour;

	switch ($mois) {
		case 1:
			$nb_jours_depart += 0; // Pas de mois entier passé
			break;

		case 2:
			$nb_jours_depart += 31; // Juste le mois de janvier passé
			break;

		case 3:
			$nb_jours_depart += 59; // Le mois de février passé
			break;

		case 4:
			$nb_jours_depart += 90; // Le mois de mars passé
			break;

		case 5:
			$nb_jours_depart += 120; // Le mois d'avril passé
			break;

		case 6:
			$nb_jours_depart += 151; // Le mois de mai passé
			break;

		case 7:
			$nb_jours_depart += 181; // Le mois de juin passé
			break;

		case 8:
			$nb_jours_depart += 212; // Le mois de juillet passé
			break;

		case 9:
			$nb_jours_depart += 243; // Le mois d'août passé
			break;

		case 10:
			$nb_jours_depart += 273; // Le mois de septembre passé
			break;

		case 11:
			$nb_jours_depart += 304; // Le mois d'octobre passé
			break;

		case 12:
			$nb_jours_depart += 334; // Le mois de novembre passé
			break;
	}

	$nb_jours -= $nb_jours_depart;

	return $nb_jours;
}
*/