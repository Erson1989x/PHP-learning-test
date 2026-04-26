<?php

use Core\Validator;
use Core\App;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

// Validation

$errors = [];

if (!Validator::string($name, 1, 255)) {
    $errors['name'] = "Name is required and must be less than 255 characters.";
}

if (!Validator::email($email)) {
    $errors['email'] = "A valid email address is required.";
}

if (!Validator::string($password, 8)) {
    $errors['password'] = "Password is required and must be at least 8 characters.";
}

if ($password !== $password_confirmation) {
    $errors['password_confirmation'] = "Password confirmation does not match.";
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "heading" => "Create an account",
        "error" => $errors
    ]);
}

$db = App::resolve('Core\Database');

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {
    $errors['email'] = "An account with this email already exists.";
    return view("registration/create.view.php", [
        "heading" => "Create an account",
        "error" => $errors
    ]);
} else {
    $db->query("insert into users (name, email, password) values (:name, :email, :password)", [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login([
        'id' => $db->lastInsertId(),
        'name' => $name,
        'email' => $email,
    ]);

    header("Location: /");
    die();
}