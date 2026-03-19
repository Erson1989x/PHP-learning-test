<?php

use Core\App;
use Core\Database;

//$db = App::container()->resolve('Core\Database');// $db = App::container()->resolve( \Core\Database::class);
$db = App::resolve('Core\Database');

$currentUserId = 1; // Replace with the actual current user ID from your authentication system
$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);


$db->query("DELETE FROM notes where id = :id", [
    'id' => $_POST['id']
]);

header("Location: /notes");
exit();