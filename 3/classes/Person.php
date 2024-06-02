<?php

namespace App;

class Person
{
    private $name;
    private $surname;
    private $gender;
    private $wardrobe = [];

    public function __construct($name, $surname, $gender)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->gender = $gender;
    }

    public function addToWardrobe($wardrobeItem)
    {
        //if ($this->gender == "male" && $wardrobeItem instanceof \Wardrobe\Skirt) {
        if ($this->gender == "male" && get_class($wardrobeItem) == "Wardrobe\Skirt") {
        } else {
            array_push($this->wardrobe, $wardrobeItem);
        }
    }

    public function print()
    {
        echo "{$this->name} {$this->surname} ({$this->gender}), wears: <br />";

        if (count($this->wardrobe) == 0) {
            echo "No clothes yet";
            return;
        }

        foreach ($this->wardrobe as $wardrobeItem) {
            echo $wardrobeItem->print() . "<br />";
        }
    }

    public function orderWardrobe()
    {
        $allSizes = ["XS", "S", "M", "L", "XL"];
        $groupedBySize = [];
        $result = [];

        //WOULD WORK, BUT LET'S TRY TO IMPLEMENT SOMETHING MORE EFFECTIVE
        //THIS WAY IF WE HAVE 100 ELEMENTS IN THE WARDROBE AND 5 AVAILABLE SIZES
        //THE CODE WILL ITERATE 500 TIMES TO SORT ALL CLOTHES
        // foreach ($allSizes as $size) {
        //     foreach ($this->wardrobe as $wardrobeItem) {
        //         if ($wardrobeItem->getSize() == $size) {
        //             array_push($result, $wardrobeItem);
        //         }
        //     }
        // }

        //THIS WAY IF WE HAVE 100 ELEMENTS IN THE WARDROBE AND 5 AVAILABLE SIZES
        //THE CODE WILL ITERATE 200 TIMES TO SORT ALL CLOTHES
        foreach ($this->wardrobe as $wardrobeItem) {
            if (!isset($groupedBySize[$wardrobeItem->getSize()])) {
                $groupedBySize[$wardrobeItem->getSize()] = [];
            }

            array_push($groupedBySize[$wardrobeItem->getSize()], $wardrobeItem);
        }
        //["S" => [$shirt1, $skirt1], "M" => [$skirt2], "L" => [$shirt1, $trousers1]]

        foreach ($allSizes as $size) {
            if (isset($groupedBySize[$size])) {
                foreach ($groupedBySize[$size] as $wardrobeItem) {
                    array_push($result, $wardrobeItem);
                }
            }
        }

        $this->wardrobe = $result;
    }
}
