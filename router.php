<?php

$routes = require "routes.php";

/*
if($URL === "/") {
    require "controllers/index.php";
} elseif($URL === "/about") {
    require "controllers/about.php";
} elseif($URL === "/contact") {
    require "controllers/contact.php";
}
    */


function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

function routeTo($URL, $routes) {
    if(array_key_exists($URL, $routes)) {
        require $routes[$URL];
    } else {
        abort();
    };
}

$URL = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) ?? "/";

// If the app is hosted in a subfolder (e.g. http://localhost/PhP), strip that prefix.
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$basePath = rtrim($basePath, '/');
if ($basePath !== '' && $basePath !== '/') {
    if (strpos($URL, $basePath) === 0) {
        $URL = substr($URL, strlen($basePath));
    }
    if ($URL === '') {
        $URL = '/';
    }
}

// Normalize trailing slash: /about/ -> /about
if ($URL !== '/') {
    $URL = rtrim($URL, '/');
}

routeTo($URL, $routes);