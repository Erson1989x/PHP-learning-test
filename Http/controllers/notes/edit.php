<?php 

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);


view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "error" => [],
    "note" => $note
]);