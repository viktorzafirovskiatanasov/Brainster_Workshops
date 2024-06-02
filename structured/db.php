<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=workshop_pdo', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    echo 'Something went wrong.';
    die();
}