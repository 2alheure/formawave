<?php

/********* Partie 3 ***************************************************************/
/********* C. Récupérer des données de requêtes (les superglobales) ***************/
/********* I. GET *****************************************************************/

/**
 * Faire un formulaire (en GET)
 * qui contient 2 champs : phrase et nombre
 * 
 * A la soumission du formulaire, 
 * vous affichez $nombre fois la phrase $phrase.
 * 
 * (PAS DE JAVASCRIPT)
 * 
 * (P.S. : Vérifiez que le nombre n'est pas trop grand...)
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>P3-C-I</title>
</head>

<body>
	<form action="#" method="get">
		<label for="phrase">Phrase</label>
		<input type="text" class="form-control" name="phrase" id="phrase" placeholder="Phrase"><br>

		<label for="number">Nombre</label>
		<input type="number" class="form-control" name="number" id="number" placeholder="Nombre" min="1" max="999"><br>

		<button type="submit" class="btn btn-primary">Envoyer</button>
	</form>

	<?php
	if (
		isset($_GET['phrase'], $_GET['number'])
		&& is_numeric($_GET['number']) 
		&& $_GET['number'] > 0
		&& $_GET['number'] < 1000
	) {
		echo str_repeat($_GET['phrase'] . '<br>', $_GET['number']);
	}
	?>

</body>

</html>