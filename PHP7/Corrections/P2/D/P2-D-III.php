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


function nbJoursDepuis(int $jour, int $mois, int $annee)
{
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
