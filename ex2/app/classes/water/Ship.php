<?php

namespace Water;

use \Transport\Transport;

class Ship extends Transport
{
    private $fuel; 
    private $fuelPrice;

    public function __construct($width, $height, $fuel, $fuelPrice){
        parent::__construct($width, $height);
        $this->fuel = $fuel;
        $this->fuelPrice = $fuelPrice;
    }

    public function price(){
        return ((($this->width / 100) * $this->fuel) * $this->fuelPrice);
    }
}

//((($width / 100) * $fuel) * $fuelPrice).
