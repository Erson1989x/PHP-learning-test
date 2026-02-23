<?php

require "Validator.php";

$config = require "config.php";

$db = new Database($config['database']);

$heading = "Create a new note";

// dd(validator::email('erson@example.com'));

// if(! Validator::email('erson@example.com')) {
//    dd("Not a valid email");
//}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $error = [];

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

require "views/note-create-view.php";