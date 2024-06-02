<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/autoload_classes.php';; //$pdo


    $params = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'location_id' => $_POST['location']
    ];

    $user = new User();

    $response = $user->updateUser($params);

    $_SESSION['message'] = $response;

}

header('Location: index.php');
die();