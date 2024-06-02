<?php 
session_start();


require_once('functions.php');

$old_values = ['name' => '', 'song1' => '',  'song2' => '',  'song3' => '',  'song4' => '',  'song5' => ''];
$errors = ['name' => '', 'song' => ''];


if(isset($_SESSION['old_values'])){
    $old_values['name'] = $_SESSION['old_values']['name'];
    $old_values['song1'] = $_SESSION['old_values']['song1'];
    $old_values['song2'] = $_SESSION['old_values']['song2'];
    $old_values['song3'] = $_SESSION['old_values']['song3'];
    $old_values['song4'] = $_SESSION['old_values']['song4'];
    $old_values['song5'] = $_SESSION['old_values']['song5'];
}

//handling error msgs from session
if(isset($_SESSION['errors']) && count($_SESSION['errors'])){
    if(isset($_SESSION['errors']['name'])){
        switch ($_SESSION['errors']['name']) {
            case 'empty':
                $errors['name'] = errorGenerator('The name must not be empty please enter a value');
            break;
            case 'exists':
                $errors['name'] = errorGenerator('The name already exists please enter a unique one');
            break;
        }
    }
    if(isset($_SESSION['errors']['song'])){
        switch ($_SESSION['errors']['song']) {
            case 'empty':
                $errors['song'] = errorGenerator('Please fill out all the URL inputs');
            break;
            case 'invalid':
                $errors['song'] = errorGenerator('All URLs must be valid format');
            break;
                
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>My Playlist - Create</title>
</head>

<body>
    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1">
                <h1>Create New Playlist</h1>
                <?= $errors['name'] ?>
                <?= $errors['song'] ?>
                <form action="./store.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Playlist name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $old_values['name'] ?>">
                        <small id="nameHelp" class="form-text text-muted">Choose a unique playlist name. Please use only letters and numbers, no special chars.</small>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="song1" name="song1" value="<?= $old_values['song1'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="song2" class="form-label">Song 2</label>
                        <input type="text" class="form-control" id="song2" name="song2" value="<?= $old_values['song2'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="song3" class="form-label">Song 3</label>
                        <input type="text" class="form-control" id="song3" name="song3" value="<?= $old_values['song3'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="song4" class="form-label">Song 4</label>
                        <input type="text" class="form-control" id="song4" name="song4" value="<?= $old_values['song4'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="song5" class="form-label">Song 5</label>
                        <input type="text" class="form-control" id="song5" name="song5" value="<?= $old_values['song5'] ?>">
                    </div>
                    <a href="./index.php" class="btn btn-dark">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>