<!doctype html>
<html lang="en">

<head>
	<title>Mon super site</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
	<div class="container">

		<nav class="nav justify-content-center">
			<a class="nav-link <?php if (currentUrl() == url()) echo 'active'; ?>" href=" <?= url() ?>">Home</a>
			<a class="nav-link <?php if (currentUrl() == url('/about')) echo 'active'; ?>" href=" <?= url('/about') ?>">About</a>
			<a class="nav-link <?php if (currentUrl() == url('/test-bdd')) echo 'active'; ?>" href=" <?= url('/test-bdd') ?>">Test avec des données de la BDD</a>
		</nav>