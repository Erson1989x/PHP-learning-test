<?php

$config = require "config.php";

$db = new Database($config['database']);

$heading = "Note";
$currentUserId = 1; // Replace with the actual current user ID from your authentication system


$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);




require "views/note.view.php";