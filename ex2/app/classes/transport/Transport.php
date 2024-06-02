<?php

namespace Transport;

abstract class Transport
{
    protected $width;
    protected $height;

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    abstract public function price();
}