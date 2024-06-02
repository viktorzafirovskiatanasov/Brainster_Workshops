<?php

abstract class DB
{
    protected $instance;

    public function __construct(){
        try {
            $this->instance = new PDO('mysql:host=localhost;dbname=workshop_pdo', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $e) {
            echo 'Something went wrong.';
            die();
        }
    }
}