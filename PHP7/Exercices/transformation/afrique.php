<!doctype html>
<html lang="en">

<head>
	<title>Horloges d'Afrique</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<div class="container">

		<nav class="nav justify-content-center">
			<a class="nav-link " href="europe.php">Europe</a>
			<a class="nav-link" href="asie.php">Asie</a>
			<a class="nav-link" href="afrique.php">Afrique</a>
		</nav>

		<div class="row">

			<div class="card text-left m-4">
				<div class="card-body">
					<h4 class="card-title">Abidjan</h4>
					<p class="card-text">
						<?php
						date_default_timezone_set('Africa/abidjan');
						echo date('H:i');
						?>
					</p>
				</div>
			</div>

			<div class="card text-left m-4">
				<div class="card-body">
					<h4 class="card-title">Djibouti</h4>
					<p class="card-text">
						<?php
						date_default_timezone_set('Africa/djibouti');
						echo date('H:i');
						?>
					</p>
				</div>
			</div>

			<div class="card text-left m-4">
				<div class="card-body">
					<h4 class="card-title">Casablanca</h4>
					<p class="card-text">
						<?php
						date_default_timezone_set('Africa/casablanca');
						echo date('H:i');
						?>
					</p>
				</div>
			</div>

		</div>
	</div>
</body>

</html>