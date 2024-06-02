<?php

require_once('./functions.php');
$b = '<br>';
$p = '<pre>';
// $haystack = 'www.facebook.com';
// $needle = 'youtube';
// var_dump(strpos($haystack, $needle) == false);

// var_dump(!filter_var('https://www.youtube.com/watch?v=djV11Xbc914&list=PLCD0445C57F2B7F41&ab_channel=a-ha', FILTER_VALIDATE_URL));
echo $b, $b;

// $data = trim(file_get_contents('playlists.txt'));

// $data = explode(PHP_EOL, $data);
$url = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLCD0445C57F2B7F41&index=7&ab_channel=RickAstley';

echo $p;

$parsed_url = parse_url($url);

parse_str($parsed_url['query'], $output);

print_r($output['v']);
// parse_str($parsed_url['query'], $output);



// var_dump(invalidYoutube('https://www.youtube.com/watch?v=djV11Xbc914&list=PLCD0445C57F2B7F41&ab_channel=a-ha'));
// $_SESSION




//var_dump();
//print_r();
