<?php
/**
 * 01. Создадете две варијабли a и b што имаат некакви вредности. 
 * Напишете скрипта со што а ќе ја превземе вредноста на b, а b 
 * ќе ја превземе вредноста на a. Испечатете го следново: 
 */

$divider = '<br><br><hr>';

$a = 5;
$b = 10;
$c = $a;

echo 'The value of $a is ' . $a . ' and the value of $b is ' . $b;
echo '<br><br>';
echo $a . ', ' . $b;

echo '<br><br>';

$a = $b;
$b = $c;

echo 'The value of $a after swapping is ' . $a . ' and the value of $b after swapping is ' . $b;



/**
 * 02. Напиши скрипта во која ќе дефинираш некоја реченица. 
 * Доколку реченицата има повеќе од 20 карактери и повеќе од 4 зборови, 
 * конвертирај ги сите букви во големи и испечати ја, а доколку не го 
 * задоволува условот конвертирај ги сите букви во мали и испечати ја.
 */
echo $divider;

$sentence = 'ThIs iS a sEnTeNCE';

// $output = '';

echo '<br>';
if(strlen($sentence) > 20 && str_word_count($sentence)){
    $sentence = strtoupper($sentence);
} else {
    $sentence = strtolower($sentence);
}

echo $sentence;

// echo str_word_count($sentence);
echo $divider;
/**
 * 03.Напишете Switch condition што прима варијабла и ако вредноста на 
 * варијаблата е број од 1 до 10, ја испечатува нејзината вредност како стринг.
 */
$num = 8;

switch ($num) {
    case 1:
    echo 'one';
    break;
    case 2:
    echo 'two';
    break;
    case 3:
    echo 'three';
    break;
    case 4:
    echo 'four';
    break;
    case 5:
    echo 'five';
    break;
    case 6:
    echo 'six';
    break;
    case 7:
    echo 'seven';
    break;
    case 8:
    echo 'eight';
    break;
    case 9:
    echo 'nine';
    break;
    case 10:
    echo 'ten';
    break;
    default:
    echo 'Unsupported value.';
};

echo $divider;
/**
 * 04. Создадете калкулатор. Во 2 варијабли чувајте броеви, а во трета операцијата 
 * што сакате да ја извршите. Направете го калкулаторот да работи со +,-,* ,/ 
 * и на степен (^), со тоа што првата бројkа ќе биде бројот, а втората степенот.
 */
$number1 = 1000;
$number2 = 65;
$operator = '-';
$result = null;

// echo gettype($result);


if($operator == '+'){
    $result = $number1 + $number2;
} else if ($operator == '-') {
    if($number2 > $number1){
        $result = $number2 - $number1;
    } else {
        $result = $number1 - $number2;
    }; 
} else if ($operator == '*') {
    $result = $number1 * $number2;
} else if ($operator == '/') {
    $result = $number1 / $number2;
} else if ($operator == '^') {
    $result = $number1 ^ $number2;
} else {
    $result = 'Please enter a valid operator value';
}

echo $result;
echo $divider;
 
/**
 * 05. Да се направи веб страна за профил на човек. Со помош на PHP во 
 * варијабли запишете омилена боја, возраст, пол и стринг што е патека до слика. 
 * Со помош на PHP:
 * a. Обојте ја страната (позадинска боја) во омилената боја на човекот
 * b. Ако возраста е под 15 години тогаш целиот текст на страната да биде со големина 12px, 
 *    ако е од 16 до 55 - со 20px, а ако е 56+ големината да е 40px.
 * c. Ако полот е машки, тогаш буквите да се црни. Ако полот е женски тогаш буквите да се бели. 
 *    Ако било која друга вредност е внесена, тогаш текстот да е во виолетова боја.
 * d. Со помош на PHP да се прикаже сликата.
 * e. До сликата нека се појават сите податоци што ги чуваме за корисникот во листа со тоа 
 *    што сликата да биде линкувана и да може да се притисни не линкот за да ја отвори во нов прозорец.
 */
?>
