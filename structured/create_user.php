<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/db.php';

    $params = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'location_id' => $_POST['location'],
        'joined' => date('d-m-Y')
    ];

    $sql = 'INSERT INTO users(name, surname, email, location_id, joined) VALUES (:name, :surname, :email, :location_id, :joined)';

    $stmt = $pdo->prepare($sql);

    if($stmt->execute($params)){
        $_SESSION['status'] = '<h3 class="text-success">User ' . $_POST['name'] . ' ' . $_POST['surname'] .' successfuly created</h3>';
    } else {
        $_SESSION['status'] = '<h3 class="text-danger">Something went wrong</h3>';
    };
}

header('Location: index.php');
die();