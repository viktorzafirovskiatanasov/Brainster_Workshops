<?php

$error_msgs = ['name' => false, 'email' => false, 'web' => false, 'comment' => false, 'gender' => false];
$name = $email = $comment = $web = $gender = '';
$can_be_posted = true;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!isset($_POST['full_name']) || empty($_POST['full_name'])){
        $error_msgs['name'] = 'The name is required';
        $can_be_posted = false;
    } else {
        $name = $_POST['full_name'];
    }

    if(!isset($_POST['email']) || empty($_POST['email'])){
        $error_msgs['email'] = 'The email is required';
        $can_be_posted = false;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error_msgs['email'] = 'Please enter a valid email format';
        $can_be_posted = false;
    } else {
        $email = $_POST['email'];
    }

    if(!empty($_POST['web']) && !filter_var($_POST['web'], FILTER_VALIDATE_URL)){
        $error_msgs['web'] = 'Please enter a valid website format';
        $can_be_posted = false;
    } else {
        $web = $_POST['web'];
    }

    if(!isset($_POST['comment']) || empty($_POST['comment'])){
        $error_msgs['comment'] = 'You must provide a comment';
        $can_be_posted = false;
    } else {
        $comment = $_POST['comment'];
    }

    if(!isset($_POST['gender']) || empty($_POST['gender'])){
        $error_msgs['gender'] = 'Please select a gender';
        $can_be_posted = false;
    } else {
        $gender = $_POST['gender'];
    }

    if($can_be_posted){
        $data =  $name . '|'. $email . '|' . $web . '|' . $comment . '|' . $gender . PHP_EOL;
        file_put_contents('admin.txt', $data, FILE_APPEND);
        $name = $email = $comment = $web = $gender = '';
    }
    $write =  $email . ', ' . $username . '='. md5($password);
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .req::after{
            content: ' *';
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label class="req" for="full_name">Name</label>
            <br>
            <input id="full_name" type="text" name="full_name" placeholder="Enter your name" value="<?= $name ?>">
            <?= $error_msgs['name'] ? '<small style="color: red;">' . $error_msgs['name'] . '</small>' : '' ?>
        </div>
        <div>
            <label class="req" for="email">E-Mail</label>
            <br>
            <input id="email" type="text" name="email" placeholder="Enter your email" value="<?= $email ?>">
            <?= $error_msgs['email'] ? '<small style="color: red;">' . $error_msgs['email'] . '</small>' : '' ?>
        </div>
        <div>
            <label for="web">Website</label>
            <br>
            <input id="web" type="text" name="web" placeholder="Type in your website" value="<?= $web ?>">
            <?= $error_msgs['web'] ? '<small style="color: red;">' . $error_msgs['web'] . '</small>' : '' ?>
        </div>
        <div>
            <label class="req" for="comment">Comment</label>
            <br>
            <textarea id="comment" cols="25" rows="2" name="comment" placeholder="Enter a comment"><?= $comment ?></textarea>
            <?= $error_msgs['comment'] ? '<small style="color: red;">' . $error_msgs['comment'] . '</small>' : '' ?>
        </div>
        <div>
            <label class="req">Gender</label>
            <br>
            <label for="male">Male</label>
            <input id="male" type="radio" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?>>
            <br>
            <label for="female">Female</label>
            <input id="female" type="radio" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?>>
            <br>
            <?= $error_msgs['gender'] ? '<small style="color: red;">' . $error_msgs['gender'] . '</small>' : '' ?>
        </div>
        <br>
        <input type="submit">
        <br>
        <small>All fields marked with * are required</small>
    </form>
</body>
</html>