<?php
session_start();
session_unset();
//    print_r($_POST);
require_once('./functions.php');

$origin = 'store';

$_SESSION['errors'] = [];
$_SESSION['old_values'] = ['song1' => '', 'song2' => '', 'song3' => '', 'song4' => '', 'song5' => ''];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = strtolower(trim($_POST['name']));
    $_SESSION['old_values']['name'] = $name;

    if(empty($name)){
        $_SESSION['errors']['name'] = 'empty';
        redirect('create.php', $origin);
    } else if (false) {
        $_SESSION['errors']['name'] = 'exists';
        //here we will set session error for existing name & redirect
    }

    $songs = [$_POST['song1'], $_POST['song2'], $_POST['song3'], $_POST['song4'], $_POST['song5']];

    $i = 1;
    foreach($songs as $song){
        $_SESSION['old_values']['song' . $i] = $song;
        $i++;
    }

    foreach($songs as $song){
       if(empty($song)){
            $_SESSION['errors']['song'] = 'empty';
            redirect('create.php', $origin);
       } else if (!filter_var($song, FILTER_VALIDATE_URL) || invalidYoutube($song)){
            $_SESSION['errors']['song'] = 'invalid';
       }
    }
    if(!count($_SESSION['errors'])){
        $data = $name . '|' . $songs[0] . '|' . $songs[1] . '|' . $songs[2] . '|' . $songs[3] . '|' . $songs[4] . '|' . $songs[5] . PHP_EOL;
        if(file_put_contents('playlists.txt', $data, FILE_APPEND)){
            redirect('index.php', $origin);
        } else {
            redirect('create.php', $origin);
        };
    }
    redirect('create.php', $origin);
} else {
    redirect('index.php', $origin);
}