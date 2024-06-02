<?php

namespace Wardrobe;

require_once __DIR__ . "/WardrobeItem.php";

class Skirt extends WardrobeItem
{
    private $length;

    public function __construct($size, $color, $length)
    {
        parent::__construct($size, $color);
        $this->length = $length;
    }

    public function print()
    {
        return "Skirt, size: {$this->getSize()}, color: {$this->getColor()}, length: {$this->getLength()}";
    }

    public function getLength()
    {
        return $this->length . "cm";
    }
}
