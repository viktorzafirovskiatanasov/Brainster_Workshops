<?php

namespace Wardrobe;

require_once __DIR__ . "/WardrobeItem.php";

class Shirt extends WardrobeItem
{
    private $type;
    private $availableTypes = ["short", "long"];

    public function __construct($size, $color, $type)
    {
        parent::__construct($size, $color);
        $this->setType($type);
    }

    public function print()
    {
        return "Shirt, size: {$this->getSize()}, color: {$this->getColor()}, type: {$this->getType()}";
    }

    public function getType()
    {
        return $this->type . " sleeves";
    }

    public function setType($type)
    {
        if (!in_array($type, $this->availableTypes)) {
            $this->type = "Not specified";
        } else {
            $this->type = $type;
        }
    }
}
