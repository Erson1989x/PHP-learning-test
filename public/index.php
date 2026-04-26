<?php 

use Core\App;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class) {
    // Core\Database -> Core/Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

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

$router ->route($url, $method);

