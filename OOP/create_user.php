<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/autoload_classes.php';; //$pdo


    $params = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'location_id' => $_POST['location'],
        'joined' => date('d-m-Y')
    ];

    $user = new User();

    $response = $user->createUser($params);

    $_SESSION['message'] = $response;

}

header('Location: index.php');
die();