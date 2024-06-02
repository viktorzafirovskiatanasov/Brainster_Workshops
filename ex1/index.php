<?php
require_once __DIR__ . '/app/classes/Calculator.php';

$cal = new Calculator();

$a = 6;
$b = 18;

$cal->add($a, $b);
$cal->subtract($a, $b);
$cal->multiply($a, $b);
$cal->divide($a, $b);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excercise 1</title>
</head>
<body>
    <h1>Excercise 1</h1>
    <h2><?= $cal->print() ?></h2>
</body>
</html>