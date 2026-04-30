<?php

use Core\Authenticator;
// log the user out
$auth = new Authenticator();
$auth->logout();


header("Location: /");
die();