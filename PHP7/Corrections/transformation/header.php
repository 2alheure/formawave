<!doctype html>
<html lang="en">

<head>
	<title>Horloges de <?php echo $continent_choisi['fr']; ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<div class="container">

		<nav class="nav justify-content-center">

			<?php
			foreach ($continents as $clef => $element) {
				echo '<a class="nav-link " href="' . $clef . '.php">' . $element['fr'] . '</a>';
			}
			?>
		</nav>

		<div class="row">