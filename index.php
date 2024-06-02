<?php


    $has_records = false;
    $data = file('playlists.txt');
    if(count($data)){
        $has_records = true;
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

    <title>My Playlist</title>
</head>

<body>
    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1 d-flex justify-content-between align-items-center">
                <h1>Playlist Catalogue</h1>
                <a class="btn btn-dark" href="./create.php">Create new</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    <!-- all playlists -->
                    <!-- at first, we have no playlists yet -->
                    <?php if(!$has_records) { ?>
                        <div class="alert alert-dark">
                            No playlists added yet.
                        </div>
                    <?php } else { 
                        foreach ($data as $value) {  
                        $playlist_name = explode('|', $value)[0];
                    ?>
                    <!-- example card for playlist bellow-->

                    <div class="card col-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $playlist_name ?></h5>
                            <a href="./playlist.php?file=<?= $playlist_name ?>" class="btn btn-primary">See playlist</a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>