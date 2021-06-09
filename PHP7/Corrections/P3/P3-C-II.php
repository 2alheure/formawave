<?php

/********* Partie 3 ***************************************************************/
/********* C. Récupérer des données de requêtes (les superglobales) ***************/
/********* I. POST ****************************************************************/

/**
 * Faire un formulaire (en POST)
 * qui contient 2 champs : identifiant et mot de passe.
 * 
 * A la soumission du formulaire,
 * On vérifie que l'identifiant et le mot de passe 
 * correspondent à ceux que l'on attend (stockés dans des variables).
 * 
 * S'ils correspondent, on affiche une page de succès, 
 * sinon une page d'erreur.
 * 
 * (PAS DE JAVASCRIPT)
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>P3-C-II</title>
</head>

<body>
	<form action="#" method="post">

		<label for="identifiant">Identifiant</label>
		<input type="text" name="identifiant" id="identifiant"><br>

		<label for="mdp">Mot de passe</label>
		<input type="password" name="mdp" id="mdp"><br>

		<input type="submit" value="Se connecter">

	</form>

	<?php

	$correct_login = 'admin';
	$correct_password = 'abcde';

	if (isset($_POST['identifiant'], $_POST['mdp'])) {
		if (
			$_POST['identifiant'] == $correct_login
			&& $_POST['mdp'] == $correct_password
		) {
			// include 'page_admin.php';	// J'inclus la page d'admin
			// header('location: page_admin.php'); // Je redirige vers la page d'admin
			echo 'Bienvenue, Administrateur.';
		} else {
			echo 'Tu t\'es trompé de mot de passe.';
		}
	}

	?>
</body>

</html>