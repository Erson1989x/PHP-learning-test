<?php 

use Core\App;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "vendor/autoload.php";

require BASE_PATH . "Core/functions.php";

require base_path("/views/bootstrap.php");

if (isset($_SESSION['user']) && $_SESSION['user']) {
    $sessionUser = $_SESSION['user'];
    $userId = null;

    if (is_array($sessionUser) && isset($sessionUser['name'], $sessionUser['email'])) {
        $userId = null;
    } elseif (is_array($sessionUser) && isset($sessionUser['id'])) {
        $userId = $sessionUser['id'];
    } else {
        $userId = $sessionUser;
    }

    if ($userId !== null) {
        $user = App::resolve('Core\Database')->query("select id, name, email from users where id = :id", [
            'id' => $userId,
        ])->find();

        $_SESSION['user'] = $user ?: null;
    }
}

$router = new \Core\Router();

$routes = require base_path("routes.php");

$url = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($url, $method);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors());
    Session::flash('old', $e->old);

    return redirect($router->previousUrl());
}

Session::unfash( "errors" );