<?php

class Location extends DB
{
    public function __construct(){
        parent::__construct();
    }

    public function getLocations(){
        $pdo = $this->instance;
        
        $sql = 'SELECT * FROM locations';
        
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll();

    }
}