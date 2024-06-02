<?php
session_start();
require_once __DIR__ . "/classes/DB.php";

$pdo = \Workshops\DB::connect();

$sql = "DELETE FROM users WHERE id = :id LIMIT 1";

$stmt = $pdo->prepare($sql);

if ($stmt->execute(['id' => $_GET['id']])) {
    $_SESSION['success'] = "User deleted";
} else {
    $_SESSION['error'] = "An error occured";
}

header("Location: index.php");
die();
