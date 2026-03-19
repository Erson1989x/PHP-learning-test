<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');

$currentUserId = 1; // Replace with the actual current user ID from your authentication system

$note =  $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_POST['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "The body of no more than 1000 characters is required.";
}

if(count($errors) > 0) {
    return view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "error" => $errors,
        "note" => $note
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header("Location: /notes");
die();