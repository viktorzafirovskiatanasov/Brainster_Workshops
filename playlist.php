<?php
require_once('./functions.php');

$file = $_GET['file'];

$has_records = false;
$data = file('playlists.txt');
$display_playlist = [];
foreach ($data as $value) {
    $playlist_name = explode('|', $value);
    if($file == $playlist_name[0]){
        foreach($playlist_name as $value1) {
            $display_playlist[] = $value1;
        }
    }   
}
// print_r($display_playlist)
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Playlist</title>
</head>

<body>
    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1 d-flex justify-content-between align-items-center">
                <h1>Playlist: <?= $display_playlist[0] ?></h1>
                <a class="btn btn-dark" href="./index.php">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">

                <!-- example card with iframe for videos bellow -->
                <?php for($i = 1; $i < count($display_playlist); $i++) { ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <iframe src="<?= generateEmbedUrl($display_playlist[$i]) ?>" width="100%" height="515"></iframe>
                        </div>
                    </div>
                <?php }?>
                

            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>