<?php
require_once __DIR__ . '/autoload_classes.php';

$location = new Location();
$locations = $location->getLocations();

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
                <form action="update_user.php" method="POST">
                        <input type="text" name='id'  value="<?= $singleUser['id'] ?>" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $singleUser['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname"  value="<?= $singleUser['surname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"  value="<?= $singleUser['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" class="form-select" name="location">
                            <option selected disabled>Open this select menu</option>
                            <?php foreach($locations as $city){ ?>

                            <option <?= $singleUser['location_id'] == $city['id'] ? 'selected' : '' ?> value="<?= $city['id'] ?>"><?= $city['location'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="index.php" class="btn btn-dark mt-5">Back</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>