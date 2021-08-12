<!doctype html>
<html lang="en">

<head>
	<title><?php echo $html_title; ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<?php if ($on_est_sur_un_article) { ?>
		<link rel="stylesheet" href="<?php echo asset('css/style_banner.css'); ?>">
	<?php } ?>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index_controller.php">Mon super blog</a>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index_controller.php">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="liste-articles_controller.php">Mes super articles</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>