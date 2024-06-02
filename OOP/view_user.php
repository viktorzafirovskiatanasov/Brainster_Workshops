<?php
require_once __DIR__ . '/autoload_classes.php';

$user = new User();
$singleUser = $user->getSingleUser($_GET['id']);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-6 offset-3">
                <h1>Name: <?= $singleUser['name'] ?></h1>
                <p>Surname: <?= $singleUser['surname'] ?></p>
                <p>Email: <?= $singleUser['email'] ?></p>
                <p>Location: <?= $singleUser['location'] ?></p>
                <p>Joined: <?= $singleUser['joined'] ?></p>
                <a href="index.php" class="btn btn-dark mt-5">Back</a>
            </div>         
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>