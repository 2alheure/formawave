<?php

/**
 * Retrieves an environment variable
 * 
 * @param string $name The environment variable to retrieve
 * @return mixed The environment variable
 */
function env(string $name) {
	return isset($_ENV[$name]) ? $_ENV[$name] : null;
}

/**
 * Calls a view and passes it some values
 * 
 * @param string $file 		The name of the view file
 * @param array  $tableau	An array containing all necessary values for the view
 * @return void
 * @throws Exception
 */
function view(string $file, array $tableau = null) {

	$filePath = __DIR__ . '/../View/' . $file . '.php';
	if (!is_file($filePath)) throw new Exception('View not found: ' . $file);

	// On a besoin de variables dans notre vue,
	// Donc on récupère un tableau et on crée les variables
	// A partir de ce tableau
	if (!empty($tableau)) extract($tableau);

	include $filePath;
}

/**
 * Renders an error page
 * 
 * @param string $message 	The error message to display
 * @param int	 $code		The HTTP error code
 * @return void
 */
function error(string $message, int $code) {
	switch ($code) {
			// If it's a 404 or 500 error, 
			//we already have a function for that
		case 404:
			error404($message);
		case 500:
			error500($message);

			// Or we can call the default error's view
		default:
			view('errors/default', array(
				'message' => $message,
				'code' => $code
			));
	}
	die;
}

/**
 * Renders a 404 error page
 * 
 * @param string $message 	The error message to display
 * @return void
 */
function error404($message = 'Nous sommes désolés, il fait tellement noir qu\'on n\'arrive pas à trouver ce que vous cherchez...') {
	view('errors/404', array(
		'message' => $message,
	));
	die;
}

/**
 * Renders a 500 error page
 * 
 * @param string $message 	The error message to display
 * @return void
 */
function error500($message = 'Une erreur inattendue est survenue') {
	view('errors/500', array(
		'message' => $message,
	));
	die;
}

/**
 * Prints the debug information of a variable
 * 
 * @param mixed $var The variable to output
 * @return void
 */
function dd($var) {
	var_dump($var);
	die;
}

/**
 * Retrieves a segment of the current URI
 * 
 * @param int $index Which segment to retrieve (starting from 0)
 * @return mixed The URI segment
 */
function uriSegment(int $index) {
	return isset(env('CURRENT_URI')[$index]) ? env('CURRENT_URI')[$index] : '';
}

/**
 * Retrieves the current route name
 * 
 * @return string The route name
 */
function route() {
	return isset(env('CURRENT_URI')[0]) ? env('CURRENT_URI')[0] : '';
}

/**
 * Generates an URL (based upon the configured BASE_URL)
 * 
 * @return string The URI to add to the URL
 * @return string The generated URL
 */
function url(string $uri = '/') {
	if (!empty(env('BASE_URL'))) {
		if ($uri != '/') return env('BASE_URL') . $uri;
		return env('BASE_URL');
	}

	return $uri;
}

/**
 * Generates an URL (based upon the configured BASE_URL)
 * pointing to an asset
 * 
 * @return string The asset to generate an URL for
 * @return string The generated URL
 */
function asset(string $asset) {
	if (!empty(env('BASE_URL'))) return env('BASE_URL') . '/assets/' . $asset;
	return '/assets/' . $asset;
}

/**
 * Returns the current URL
 * 
 * @return string The curent URL
 */
function currentUrl() {
	return url('/' . implode('/', env('CURRENT_URI')));
}
