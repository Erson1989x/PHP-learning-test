<?php

// login the user if the credentials are match.

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view("session/create.view.php", [
        "heading" => "Login to Your Account",
        "error" => $form->errors()
    ]);
}

// match the credentials with the database

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ]);

        header("Location: /");
        die();
    }
}

//we have a user with this email, now we need to verify the password provide matches the one in the database


return view("session/create.view.php", [
    "heading" => "Login to Your Account",
    "error" => $form->errors()
]);
