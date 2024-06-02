<?php
echo 'Workshop 13 - PHP Arrays & Loops<br><hr>';

$b = '<br>';

//Excercise 7
$voters = ['Jack' => 25, 'jack' => 25, 'john' => 15, 'alice' => 20, 'Alice' => 20, 'Mike' =>10, 'jane' => 30];
foreach($voters as $voter => $age){
    if($age > 18){
       if(ctype_upper(substr($voter, 0, 1))){
            echo '<span style="color: green">' . $voter . '</span>', $b;
       } else {
            echo '<span style="color: red">' . $voter . '</span>', $b;
       }
    }
}



die();
//Excercise 6
$voters = ['Jack' => 25, 'John' => 15, 'Alice' => 20, 'Mike' =>10, 'Jane' => 30];

echo 'People that are eligible to vote:', $b;
foreach($voters as $voter => $age){
    if($age > 18){
        echo $voter, $b;
    }
}


die();
//Excercise 5

$numbers = [18, 23, 1, 95, 68, 11, 100, 49];
$min = $numbers[0];
$max = $numbers[0];
for($i = 1; $i < count($numbers); $i++){
    if($numbers[$i] < $min){
        $min = $numbers[$i];
    }
    if($numbers[$i] > $max){
        $max = $numbers[$i];
    }
}
if($max - $min > 100){
    echo 'The difference between the numbers in this array is huge';
} else {
    echo 'The difference between the numbers in this array is small';
}
die();
//Excercise 4
$span = '';
for($i = 1; $i <= 50; $i++){
    if($i % 2 == 0 && $i % 3 == 0){
       $span = '<span style="color: orange">' . $i . '</span>';
    } else if ($i % 2 == 0){
       $span = '<span style="color: blue">' . $i . '</span>';
    } else if ($i % 3 == 0){
       $span = '<span style="color: green">' . $i . '</span>';
    } else {
       $span = '<span>' . $i . '</span>';
    }
    echo $span, $b;
}

die();
//Excercise 3
$number = 9;
for($i = 1; $i <= 10; $i++){
    echo $i . ' x ' . $number . ' = ' . $i * $number, $b;
}

die();
//Excercise 2

for($i = 234; $i <= 1986; $i++){

    $sum = 0;
    $temp = $i;

    while($temp > 0){
        $sum += $temp % 10;
        $temp = floor($temp / 10);
    }

    if($sum % 3 == 0){
        echo $i, ' ';
    }  
}

die();
//Excercise 1

$cities = ['Tokyo', 'Berlin', 'Lisbon', 'Helsinki', 'Denver', 'Nairobi', 'Rio', 'Amsterdam'];


echo 'Cities on odd indexes: ', $b;
for($i = 0; $i < 11; $i++){
    if(isset($cities[$i])){
        if($i % 2 != 0){
            echo $cities[$i], $b;
        }
    } else {
        echo 'Element on position ' . $i . ' not found', $b;
    }
}
echo $b;
echo 'Cities on even indexes: ', $b;
for($i = 0; $i < 11; $i++){
    if(isset($cities[$i])){
        if($i % 2 == 0){
            echo $cities[$i], $b;
        }
    } else {
        echo 'Element on position ' . $i . ' not found', $b;
    }
}