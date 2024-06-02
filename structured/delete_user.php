<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once __DIR__ . '/db.php';

    $sql = "DELETE FROM users WHERE id = :id";

    $stmt = $pdo->prepare($sql);


    if($stmt->execute(['id' => $_GET['id']])){
        $_SESSION['status'] = '<h3 class="text-success">User successfuly deleted.</h3>';
    } else {
        $_SESSION['status'] = '<h3 class="text-danger">Something went wrong</h3>';
    };
}

header('Location: index.php');
die();