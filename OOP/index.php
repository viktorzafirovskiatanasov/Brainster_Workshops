<?php
session_start();
require_once __DIR__ . '/autoload_classes.php';

$location = new Location();
$locations = $location->getLocations();

$user = new User();
$users = $user->getAllUsers();

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
                <?php if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                } ?>
                <form action="create_user.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" class="form-select" name='location'>
                            <option selected disabled>Open this select menu</option>
                            <?php foreach($locations as $city){ ?>

                            <option value="<?= $city['id'] ?>"><?= $city['location'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 pt-5">
                 <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Joined At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $person){ ?>
                        <tr>
                            <th scope="row"><?= $person['id'] ?></th>
                            <td><?= $person['name'] ?></td>
                            <td><?= $person['surname'] ?></td>
                            <td><?= $person['email'] ?></td>
                            <td><?= $person['location'] ?></td>
                            <td><?= $person['joined'] ?></td>
                            <td class="d-flex">
                                <a href="view_user.php?id=<?= $person['id'] ?>" class="btn btn-dark mx-1">View</a>
                                <a href="edit_user.php?id=<?= $person['id'] ?>" class="btn btn-warning mx-1">Edit</a>
                                <a href="delete_user.php?id=<?= $person['id'] ?>" class="btn btn-danger mx-1">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<?php
session_unset();
?>