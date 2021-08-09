<?php

/**
 * Affiche la card d'une horloge d'une ville
 * 
 * @param string $continent Le continent (en anglais) de la ville dont on affiche l'horloge
 * @param string $ville		La ville dont on affiche l'horloge
 */
function afficher_card(string $continent, string $ville): void {
	date_default_timezone_set($continent . '/' . $ville);
	echo '
		<div class="card text-left m-4">
			<div class="card-body">
				<h4 class="card-title">' . ucfirst($ville) . '</h4>
				<p class="card-text">'
		. date('H:i') .
		'</p>
			</div>
		</div>';
}

/**
 * Affiche la page complète des horloges d'un continent
 * 
 * @param string $continent_choisi Le continent à afficher. Doit correspondre à la clef du continent dans la variable $continents du fichier `variable.php`.
 */
function afficher_continent(string $continent_choisi): void {
	include 'variable.php';

	$continent_choisi = $continents[$continent_choisi];

	include 'header.php';

	foreach ($continent_choisi['villes'] as $ville) {
		afficher_card($continent_choisi['en'], $ville);
	}

	include 'footer.php';
}
