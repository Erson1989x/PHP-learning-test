<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);




view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);