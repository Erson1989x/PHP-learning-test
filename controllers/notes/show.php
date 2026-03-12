<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);

$currentUserId = 1; // Replace with the actual current user ID from your authentication system

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);


    $db->query("DELETE FROM notes where id = :id", [
        'id' => $_GET['id']
    ]);

    header("Location: /notes");
    exit();

} else {


$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);




view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);

}