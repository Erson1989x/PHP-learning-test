<?php

$config = require "config.php";

$db = new Database($config['database']);

$heading = "Create a new note";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $error = [];
    if (strlen($_POST["body"]) === 0) {
        $error["body"] = "The body of the note cannot be empty.";
    }
    if( strlen($_POST["body"]) > 1000) {
        $error["body"] = "The body of the note cannot exceed 1,000 characters.";
    }
    if (empty($error)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require "views/note-create-view.php";