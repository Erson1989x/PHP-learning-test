<?php

use Core\Database;
use Core\Response;
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
/*

if ($_SERVER['REQUEST_URI'] === "/") {
    echo "bg-gray-900 text-white";
} else {
    echo "text-gray-300 hover:bg-gray-700 hover:text-white";
}
*/
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404) {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function  authorize($condition, $status = Response::FORBIDDEN) {
    if(!$condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $atributes = []) {
    extract($atributes);
    require base_path("views/" . $path); // views/notes/create.view.php
}

function login ($user) {
    session_regenerate_id(true);

    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ];
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}