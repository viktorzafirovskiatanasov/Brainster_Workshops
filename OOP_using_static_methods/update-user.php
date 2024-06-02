<?php
session_start();
require_once __DIR__ . "/classes/DB.php";

$pdo = \Workshops\DB::connect();

$sql = "UPDATE users SET name = :name, surname = :surname, location_id = :location_id WHERE id = :id";


$stmt = $pdo->prepare($sql);

if ($stmt->execute([
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'location_id' => $_POST['location_id'],
    'id' => $_POST['id']
])) {
    $_SESSION['success'] = "User updated";
} else {
    $_SESSION['error'] = "An error occured";
}


header("Location: index.php");
die();
