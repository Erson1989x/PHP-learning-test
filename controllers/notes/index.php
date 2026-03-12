<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);


$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$notes =  $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
	'user_id' => $currentUserId
])->fetchAll();




view("notes/index.view.php", [
	"heading" => "My Notes",
	"notes" => $notes
]);