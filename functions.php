<?php

function redirect(string $location, string $origin) {
    $_SESSION['origin'] = $origin;
    header('Location: ' . $location);
    die();
}

function errorGenerator(string $reason): string {
    return '<div class="alert alert-danger" role="alert">' . $reason . '</div>';
}

function invalidYoutube(string $url): bool {
    return strpos($url, 'youtube') == false;
}

function generateEmbedUrl(string $url){
    $parsed_url = parse_url($url);
    parse_str($parsed_url['query'], $output);
    return 'https://www.youtube.com/embed/' . $output['v'];
}