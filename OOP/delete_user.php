<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "GET"){
    require_once __DIR__ . '/autoload_classes.php'; //$pdo

    $user = new User();

    $response = $user->deleteUser($_GET['id']);

    $_SESSION['message'] = $response;
}

header('Location: index.php');
die();