<?php
session_start();
// require_once __DIR__ . "/classes/DB.php";
require_once __DIR__ . "/classes/Location.php";
require_once __DIR__ . "/classes/User.php";

// $pdo = \Workshops\DB::connect();

$locations = \Workshops\Location::all();

// $sqlUsers = "SELECT users.id, users.name, users.surname, users.email, users.joined, locations.name as location
//             FROM users 
//             LEFT JOIN locations 
//             ON users.location_id = locations.id";
// $stmtUsers = $pdo->query($sqlUsers);
$users = \Workshops\User::all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
                    unset($_SESSION['success']);
                } else if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
                    unset($_SESSION['error']);
                }
                ?>
                <hr />
                <a class="btn btn-primary" data-toggle="collapse" href="#add-new-user" role="button">Add new</a>
                <hr />

                <div class="collapse multi-collapse" id="add-new-user">
                    <div class="card card-body">
                        <form method="POST" action="add-user.php">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select class="form-control" id="location" name="location_id">
                                    <?php
                                    foreach ($locations as $location) {
                                        echo "<option value='{$location['id']}'>{$location['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
            <hr />
            <div class="col-6 offset-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($users as $user) {
                            // $location = !empty($user['location_id']) ? $user['location_id'] : "/";
                            $location = "/";
                            foreach ($locations as $l) {
                                if ($l['id'] == $user['location_id']) {
                                    $location = $l['name'];
                                }
                            }


                            echo "<tr>
                                <th scope='user'>{$i}</th>
                                <td>{$user['name']}</td>
                                <td>{$user['surname']}</td>
                                <td>{$user['email']}</td>
                                <td>{$location}</td>
                                <td class='d-flex'>
                                    <a href='view-user.php?id={$user['id']}' class='btn btn-dark'>View</a>
                                    <a href='edit-user.php?id={$user['id']}' class='btn btn-warning'>Edit</a>
                                    <a href='delete-user.php?id={$user['id']}' class='btn btn-danger'>Delete</a>
                                
                                </td>
                            </tr>";

                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>