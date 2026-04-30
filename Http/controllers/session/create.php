<?php

use Core\Session;

view("session/create.view.php", [
    "heading" => "Login to your account",
    "errors" => Session::get('errors', [])
]);