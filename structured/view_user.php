<?php

require_once __DIR__ . '/db.php';

$sql = 'SELECT users.id, name, surname, email, location, joined FROM `users` JOIN locations ON locations.id = users.location_id WHERE users.id = :id LIMIT 1';

$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $_GET['id']]);

$user = $stmt->fetch();

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
                <div class="border">
                    <h3>Name: <?= $user['name'] ?></h3>
                    <h4>Surname: <?= $user['surname'] ?></h4>
                    <h4>Email: <?= $user['email'] ?></h4>
                    <h4>Location: <?= $user['location'] ?></h4>
                    <h4>Joined: <?= $user['joined'] ?></h4>
                </div>
                <a href="index.php" class="btn btn-dark mt-3">Back</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>