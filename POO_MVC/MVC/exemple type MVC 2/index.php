<?php

session_start();

require __DIR__ . '/vendor/autoload.php';

function fqcn_to_file_path(string $fqcn) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $fqcn) . '.php';
}
spl_autoload_register('fqcn_to_file_path');

use Controllers\AuthController;
use Controllers\StaticController;
use App\Exceptions\AccessDeniedException;
use App\Exceptions\NotFoundException;

require_once __DIR__ . '/helpers/main.php';
require_once __DIR__ . '/helpers/session_flash.php';

$route = $_SERVER['PATH_INFO'] ?? '/home';

try {
    write_log('Called page ' . $route);

    switch ($route) {
        case '/':
        case '/home':
            StaticController::displayHomepage();
            break;

        case '/login':
            AuthController::displayLoginForm();
            break;

        case '/login-handler':
            AuthController::processLoginForm();
            break;

        case '/logout':
            AuthController::logout();
            break;

        default:
            error404();
    }
} catch (AccessDeniedException $e) {
    write_log($e->getMessage(), 'error');
    include view('errors/403');
} catch (NotFoundException $e) {
    write_log($e->getMessage(), 'error');
    include view('errors/404');
} catch (Exception $e) {
    write_log($e->getMessage(), 'error');
    include view('errors/500');
}
