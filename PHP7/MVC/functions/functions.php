<?php

function asset(string $name): string {
	return BASE_URL . '/assets/' . $name;
}

function url(string $route): string {
	return BASE_URL . '?route=' . $route;
}


function redirection(string $route) {
	header('location: ' . url($route));
	die();
}

function erreur404() {
	include DOSSIER_VIEWS . '/errors/404.html.php';
	die();
}
