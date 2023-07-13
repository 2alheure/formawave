<?php

session_start();

require __DIR__ . '/vendor/autoload.php';

function fqcn_to_file_path(string $fqcn) {
    require_once __DIR__ . '/src/' . str_replace('\\', '/', $fqcn) . '.php';
}
spl_autoload_register('fqcn_to_file_path');

use App\FlashSession;
use Controllers\AuthController;
use Controllers\StaticController;
use App\Exceptions\AccessDeniedException;
use App\Exceptions\NotFoundException;

require_once __DIR__ . '/src/helpers/main.php';
require_once __DIR__ . '/src/helpers/session_flash.php';

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

        case '/error/403':  // Pour tester la page 403
            error403();

        case '/error/404':  // Pour tester la page 404
            error404();

        case '/error/500':  // Pour tester la page 500
            error();

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

FlashSession::clear();
