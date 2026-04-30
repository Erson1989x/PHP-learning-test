<?php

// login the user if the credentials are match.

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
    return view("session/create.view.php", [
        "heading" => "Login to Your Account",
        "error" => $form->errors()
    ]);
}
