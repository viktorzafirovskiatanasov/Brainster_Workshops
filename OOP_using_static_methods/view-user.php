<?php

require_once __DIR__ . "/classes/Location.php";
require_once __DIR__ . "/classes/User.php";

$locations = \Workshops\Location::all();

$user = \Workshops\User::find($_GET['id']);

if (!$user) {
    header("Location: index.php");
    die();
}


$userLocation = "/";
foreach ($locations as $location) {
    if ($location['id'] == $user['location_id']) {
        $userLocation = $location['name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div>Name: <?= $user['name'] ?></div>
                <div>Surname: <?= $user['surname'] ?></div>
                <div>Email: <?= $user['email'] ?></div>
                <div>Location: <?= $userLocation ?></div>
                <div>Joined: <?= $user['joined'] ?></div>
                <a href="index.php">Back</a>
            </div>
        </div>
    </div>
</body>

</html>