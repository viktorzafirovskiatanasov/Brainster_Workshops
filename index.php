<?php

// echo 'Workshop 15: PHP - Functions';

//1

function printPrime(){
    $temp = 0;
    for ($i=2; $i <= 50; $i++) {
        for ($j = 2; $j <= $i; $j++) { 
            if($i % $j == 0){
                $temp = $j;
                break;
            }
        }
        if($i == $temp){
            echo $i . ' is a prime number.<br>';
        }
    }
}

// printPrime();

//2

function checkLetter($letter){
    switch (strtolower($letter)) {
        case 'a':
            return 'Vowel';
            break;
        case 'e':
            return 'Vowel';
            break;
        case 'i':
            return 'Vowel';
            break;
        case 'o':
            return 'Vowel';
            break;
        case 'u':
            return 'Vowel';
            break;
        default:
            return 'Consonant';
            break;
    }
}

// checkLetter('u');

//3

function calculateRectangle($a, $b){
    $perimeter = 2 * $a + 2 * $b;
    $area = $a * $b;

    echo 'The perimeter is ' . $perimeter . ', and the area is ' . $area;
}

// calculateRectangle(2, 4);

//4

function generateRandString($num = 12){
    $randomString = '';

    for ($i=0; $i < $num; $i++) { 
        $randomString .= chr(rand(97, 122));
    }

    return $randomString;
}

// echo generateRandString(7);

//5

function fibonacci($n){
    $arr = [1, 1];
    if($n <= 2){
        echo $arr[0] . ', ' . $arr[1];
        return false;
    }
    for ($i=2; $i <= $n; $i++) { 
        $arr[] = $arr[$i - 1] + $arr[$i - 2];
    }

    echo 'The array is: ';
    for ($x=0; $x < count($arr); $x++) { 
       echo $arr[$x] . ', ';
    }
}

// fibonacci(15);

function fibonacciRec($n, $arr = [1, 1], $i = 1){

    if($n == count($arr)){
        echo 'The array is: ';
        foreach($arr as $value){
            echo $value . ', ';
        }
        return true;
    }
    $arr[] = $arr[$i] + $arr[$i - 1];
    return fibonacciRec($n, $arr, ++$i);
}

// fibonacciRec(15);

//6

function checkType($character){
    if(preg_match('/[\'^£%&$*()}{@#~?><>,|=_+¬-]/', $character)){
        return 'I cant work with this';
    } else if (is_numeric($character)) {
       return generateRandString($character);
    } else if (is_string($character)) {
        return checkLetter($character);
    }
}

// echo checkType('$');

//7

$people = ['John' => 28, 'Jane' => 23, 'Kathryn' => 23, 'Bob' => 23];

function findYoungest($arr){
    asort($arr);
    foreach($arr as $key => $value){
        echo $key . ' is the youngest with age ' . $value;
        break;
    }
}

// findYoungest($people);

function findMultipleYoungest($arr){
    $output = '';
    asort($arr);
    $youngestPerson = key($arr);
    $youngestAge = $arr[$youngestPerson];

    foreach($arr as $name => $age){
        if($age == $youngestAge){
            $output .= $name . ' is the youngest with age <br>' . $age;
        }
    }
    return $output;
}

// echo findMultipleYoungest($people);

//8 define type after solving

function dayConverter($number){
    $years = floor($number / 365);
    $weeks = floor(($number % 365) / 7);

    $days = $number - (($years * 365) + ($weeks * 7));

    return 'In ' . $number . ' days we have ' . $years . ' years, ' . $weeks . ' weeks and ' . $days . ' days.';
}

echo dayConverter(500);

//9

function dateDiff($date1, $date2){

    //explode the dates into arrays
    $expDate1 = explode('-', $date1);
    $expDate2 = explode('-', $date2);

    //calculate years difference in days
    $year1 = $expDate1[0];
    $year2 = $expDate2[0];
    $diffInYears = ($year2 - $year1) * 365;

    //calculate months difference in days
    $month1 = $expDate1[1];
    $month2 = $expDate2[1];

    function sumMonth($month){
        $monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $sum = 0;

        for ($i = 0; $i < $month; $i++) { 
            $sum +=  $monthDays[$i];
        }

        return $sum;
    }

    $daysInMonth1 = sumMonth($month1);
    $daysInMonth2 = sumMonth($month2);
    $diffInMonths = $daysInMonth2 - $daysInMonth1;

    //calculate days difference
    $day1 = $expDate1[2];
    $day2 = $expDate2[2];
    $diffInDays = $day2 - $day1;

    //sum all th differences in days and return the value
    return abs($diffInYears) + abs($diffInMonths) + abs($diffInDays);
}

// echo dateDiff("1920-07-01", "2222-07-14");