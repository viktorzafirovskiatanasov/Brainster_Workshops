<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/db.php';

    $params = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'location_id' => $_POST['location'],
    ];

    $sql = 'UPDATE users SET name = :name, surname = :surname, email = :email, location_id = :location_id WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    if($stmt->execute($params)){
        $_SESSION['status'] = '<h3 class="text-success">User ' . $_POST['name'] . ' ' . $_POST['surname'] .' successfuly updated.</h3>';
    } else {
        $_SESSION['status'] = '<h3 class="text-danger">Something went wrong</h3>';
    };
}

header('Location: index.php');
die();