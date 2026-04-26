<?php

// login the user if the credentials are match.

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "A valid email address is required.";
}

if (!Validator::string($password, 8)) {
    $errors['password'] = "Please provide a valid password.";
}

if (!empty($errors)) {
    return view("session/create.view.php", [
        "heading" => "Login to Your Account",
        "error" => $errors
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
    "error" => [
        'email' => "No account found with this email and password combination."
    ]
]);
