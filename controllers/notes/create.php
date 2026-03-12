<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");

$db = new Database($config['database']);

$error = [];

// dd(validator::email('erson@example.com'));

// if(! Validator::email('erson@example.com')) {
//    dd("Not a valid email");
//}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (!Validator::string($_POST["body"], 1, 1000)) {
        $error["body"] = "The body of no more than 1000 characters is required.";
    }

    if (empty($error)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

view("notes/create.view.php", [
    "heading" => "Create a new note",
    "error" => $error ?? []
]);