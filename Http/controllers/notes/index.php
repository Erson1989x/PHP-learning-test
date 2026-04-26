<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');


$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$notes =  $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
	'user_id' => $currentUserId
])->fetchAll();




view("notes/index.view.php", [
	"heading" => "My Notes",
	"notes" => $notes
]);