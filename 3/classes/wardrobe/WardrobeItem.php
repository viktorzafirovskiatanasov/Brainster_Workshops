<?php

namespace Wardrobe;

abstract class WardrobeItem
{
    private $size;
    private $color;

    public function __construct($size, $color)
    {
        $this->size = $size;
        $this->color = $color;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getColor()
    {
        return $this->color;
    }

    abstract public function print();
}
