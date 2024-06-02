<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excercise 3</title>
</head>
<body>
    <h1>Excercise 3</h1>
    <form action="show.php" method="POST">
        <div>
            <label for="firstname">Firstname: </label>
            <input type="text" id="firstname" name="firstname">
            <br>
            <br>
        </div>
        <div>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
            <br>
            <br>
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email">
            <br>
            <br>
        </div>
        <hr>
        <!-- Select options made through the use of class object -->
        <?php
            require_once __DIR__ . '/select_options.php';
        ?>
        <button type="submit">Submit</button>
    </form>

</body>
</html>