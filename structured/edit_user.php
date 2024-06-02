<?php

require_once __DIR__ . '/db.php';

$sql = 'SELECT * FROM locations';

$stmtLocations = $pdo->query($sql);

$sql = 'SELECT users.id, name, surname, email, location, location_id, joined FROM `users` JOIN locations ON locations.id = users.location_id WHERE users.id = :id LIMIT 1';

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
                <form action="update_user.php" method="POST">
                    <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?= $user['surname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" class="form-select" name="location">
                            <option disabled>Open this select menu</option>
                            <?php while($row = $stmtLocations->fetch()){ ?>
                                <option <?= $row['id'] == $user['location_id'] ? 'selected' : '' ?> value="<?= $row['id'] ?>"><?= $row['location'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="index.php" class="btn btn-dark mt-3">Back</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>