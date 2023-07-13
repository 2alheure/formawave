<?php

use App\Config;
use App\Exceptions\NotFoundException;
use App\Exceptions\AccessDeniedException;

/**
 * Redirects to some URL
 * @param string $url The targetted URL
 * @return void
 */
function redirect(string $url) {
    // We check if it's an internal URL (ex: '/route')
    if (str_starts_with('/', $url)) $url = url($url);

    header('location: ' . $url);
    exit;
}

/**
 * Checks whether an user is connected or not
 * @return bool
 */
function is_connected(): bool {
    return !empty($_SESSION['user']);
}

/**
 * Returns the connected user (or null)
 * Can also return a property of the connected user
 * 
 * @param ?string $property The property to return (null for full object)
 * @return mixed The connected user, or null if not connected
 */
function user(?string $property = null): mixed {
    $ret = null;

    if (is_connected()) {
        $ret = $_SESSION['user'] ?? null;

        if (!empty($property)) {
            $ret = $ret->$property ?? null;
        }
    }

    return $ret;
}

/**
 * Retrieves an environment variable
 * 
 * @param string $name The environment variable to retrieve
 * @return mixed The environment variable
 */
function env(string $name) {
    return Config::$$name ?? null;
}

/**
 * Renders an error page
 * 
 * @param string $message 	The error message to display
 * @param int	 $code		The HTTP error code
 * @return void
 * @throws Exception
 */
function error(string $message = 'An unexpected error occured', int $code = 500) {
    switch ($code) {
            // If it's a 404 or 500 error, 
            //we already have a function for that
        case 403:
            error403($message);
        case 404:
            error404($message);

            // Or we can call the default error's view
        default:
            throw new Exception($message, $code);
    }
    die;
}

/**
 * Renders a 403error403 error page
 * 
 * @param string $message 	The error message to display
 * @return void
 * @throws AccessDeniedException
 */
function error403($message = 'Access denied') {
    throw new AccessDeniedException($message);
}

/**
 * Renders a 404 error page
 * 
 * @param string $message 	The error message to display
 * @return void
 * @throws NotFoundException
 */
function error404($message = 'Page not found') {
    throw new NotFoundException($message);
}

/**
 * Generates an URL pointing to an asset
 * 
 * @param string $asset The asset to generate an URL for
 * @return string The generated URL
 */
function asset(string $asset) {
    return url('/assets/' . $asset);
}

/**
 * Generates an URL (based upon the configured BASE_URL)
 * 
 * @param string $asset The route to generate an URL to
 * @return string The generated URL
 */
function url(string $route) {
    return Config::BASE_URL . $route;
}

/**
 * Gets the full path of a view, given only its name
 * 
 * @param string $name The name of the view (without extension)
 * @return string The fullpath of this view
 */
function view(string $name): string {
    return Config::VIEWS_DIR . '/' . $name . '.html.php';
}

/**
 * Writes some log. 
 * Logs are written in the directory configured in App\Config, 
 * and the file has been given the date of the day as name.
 * 
 * @param string $message The message to write to logs
 * @param string $type The type of message to write (ex: error, debug, info, ...)
 * @return void
 */
function write_log(string $message, string $type = 'debug') {
    if (!is_dir(Config::LOGS_DIR)) {
        mkdir(Config::LOGS_DIR);
    }

    $file = Config::LOGS_DIR . '/' . date('Y-m-d') . '.log';
    $log = '[' . date('h:i:s') . '][' . mb_strtoupper($type) . ']: ' . $message . PHP_EOL;

    file_put_contents($file, $log, FILE_APPEND);
}

/**
 * Uploads a file to some directory
 * 
 * @param array $file The file as given by the $_FILES superglobal variable
 * @param string $directory The directory to which upload the file
 * @return string The name of the newly uploaded file
 */
function upload(array $file, string $directory): string {
    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_name = uniqid() . '.' . $extension;
    move_uploaded_file($file['tmp_name'], $directory . '/' . $new_name);
    return $new_name;
}
