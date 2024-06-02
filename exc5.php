<?php
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

 $name = 'Jane';
 $favColor = 'coral';
 $gender = 'female';
 $age = 14;
 $imgUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Person_icon_BLACK-01.svg/1924px-Person_icon_BLACK-01.svg.png';

 if($age <= 15){
    $fontSize = '12px';
 } else if ($age > 15 && $age <= 55){
    $fontSize = '20px';
 } else if ($age > 55 && $age <= 70) {
    $fontSize = '40px';
 } else {
    $fontSize = '70px';
 }

 if($gender == 'male') {
    $fontColor = 'black';
 } else if ($gender == 'female') {
    $fontColor = 'white';
 } else {
    $fontColor = 'purple';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo $favColor ?>;
            font-size: <?php echo $fontSize ?>;
            color: <?php echo $fontColor ?>;
        }
        img {
            width: 100px;
        }
    </style>
</head>
<body>
    <a href="<?php echo $imgUrl ?>"><img src="<?php echo $imgUrl ?>" alt=""></a>
    <ul>
        <li>Name: <?php echo $name ?></li>
        <li>Favorite color: <?php echo $favColor ?></li>
        <li>Gender:  <?php echo $gender ?></li>
        <li>Age:  <?php echo $age ?></li>
    </ul>
</body>
</html>