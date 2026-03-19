<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');
$error = [];


if (!Validator::string($_POST["body"], 1, 1000)) {
    $error["body"] = "The body of no more than 1000 characters is required.";
}

if(!empty($error)) {
    return view("notes/create.view.php", [
        "heading" => "Create a new note",
        "error" => $error
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header("Location: /notes");
exit();

