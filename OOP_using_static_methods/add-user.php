<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once __DIR__ . '/classes/DB.php';

    $pdo = \Workshops\DB::connect();


    $sql = "INSERT INTO users(name, surname, email, location_id, joined) 
                    VALUES(:name, :surname, :email, :location_id, :joined)";

    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'email' => $_POST['email'],
        'location_id' => $_POST['location_id'],
        'joined' => date("Y-m-d")
    ])) {
        $_SESSION['success'] = "User created";
    } else {
        $_SESSION['error'] = "An error occured";
    }


    header("Location: index.php");
    die();
} else {
    header("Location: index.php");
    die();
}




// $data = [];
// if() { 
//     $sql = "SELECT * FROM users"
// } else if {
//     $sql = "SELECT * FROM users WHERE age = :age";
//     $data['age'] = 25;
// } else {
//     $sql = "SELECT * FROM users WHERE age = :age OR name = :name"
//     $data['age'] = 25;
//     $data['name'] = "John";
// }

// $stmt->execute($data);
