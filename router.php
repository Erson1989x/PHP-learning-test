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

$URL = parse_url($_SERVER["REQUEST_URI"])["path"];
routeTo($URL, $routes);