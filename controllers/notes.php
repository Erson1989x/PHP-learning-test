<?php

$config = require "config.php";

$db = new Database($config['database']);

$heading = "My Notes";

$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$notes =  $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
	'user_id' => $currentUserId
])->fetchAll();




require "views/notes.view.php";