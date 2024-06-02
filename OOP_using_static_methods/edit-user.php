<?php
require_once __DIR__ . "/classes/DB.php";

$pdo = \Workshops\DB::connect();

$sqlLocations = "SELECT * FROM locations";
$stmtLocations = $pdo->query($sqlLocations);

$sqlUser = "SELECT * FROM users WHERE id = :id LIMIT 1";
$stmtUser = $pdo->prepare($sqlUser);
$stmtUser->execute(['id' => $_GET['id']]);


if ($stmtUser->rowCount() == 0) {
    header("Location: index.php");
    die();
}


$user = $stmtUser->fetch();
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
                <div class="card card-body">
                    <form method="POST" action="update-user.php">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?= $user['surname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" disabled class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select class="form-control" id="location" name="location_id">
                                <?php
                                while ($row = $stmtLocations->fetch()) {
                                    $selected = '';
                                    if ($row['id'] == $user['location_id']) {
                                        $selected = 'selected';
                                    }


                                    echo "<option $selected value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>