<?php

$data = file_get_contents('admin.txt');
$array = explode(PHP_EOL, trim($data));
var_dump($array);
echo '<br>';
echo '<br>';

foreach($array as $key => $value){
    echo '<br>';
    echo 'key: ' . $key;
    echo '<br>';
    echo 'value: ' . $value;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>