<?php 
require_once __DIR__ . '/autoload.php';

use \Land\Train;
use \Water\Ship;

$train1 = new Train(50, 78, 15, 40);
$train2 = new Train(80, 63, 25, 68);

$ship1 = new Ship(23, 22, 45, 98);
$ship2 = new Ship(56, 79, 76, 87);
echo '<pre>';
echo $train1->price();
echo '<hr>';
echo $train2->price();
echo '<hr>';
echo $ship1->price();
echo '<hr>';
echo $ship2->price();
echo '<hr>';

;
echo '</pre>';

// $objArr = [];

function lowestPrice(...$transports){
    $prices = [];
    // var_dump($transports);
    foreach($transports as $transport){
        $prices[] = $transport->price();
    }

    return min($prices);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excercise 2</title>
</head>
<body>
    <h1>Excercise 2</h1>
    <h2><?= lowestPrice($train1, $train2, $ship1, $ship2) ?></h2>
</body>
</html>