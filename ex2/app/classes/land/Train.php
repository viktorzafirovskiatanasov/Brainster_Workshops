<?php

namespace Land;

use \Transport\Transport;

class Train extends Transport
{
    private $electricity; //kWh
    private $electricityPrice;

    public function __construct($width, $height, $electricity, $electricityPrice){
        parent::__construct($width, $height);
        $this->electricity = $electricity;
        $this->electricityPrice = $electricityPrice;
    }

    public function price(){
        return $this->width * $this->electricity * $this->electricityPrice;
    }
}

//$width * $electricity * $electricityPrice