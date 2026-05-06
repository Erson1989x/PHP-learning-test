<?php

// login the user if the credentials are match.

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate( $attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$auth = new Authenticator();

if ($auth->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}
$form->error('email', 'No matching account found for that email and password.');

return redirect('/login');
