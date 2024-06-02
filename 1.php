<?php
echo 'Ex. 1<br><hr>';

class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight;

    public function __construct($description = 'Used bike'){
        $this->description = $description;
    }

    public function getInfo(){
        // return $this->brand . ' ' . $this->model . ' (' . $this->year . ')';
        return "{$this->brand} {$this->model} ({$this->year} -- {$this->description})<br>";
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function getWeight($kg = false){
        return $kg ? ($this->weight / 1000) . 'kg<br>' : $this->weight . 'g<br>';
    }

}

// $bike1 = new Bicycle('Cube', 'MTB');
$bike1 = new Bicycle();
$bike1->brand = 'Cube';
$bike1->model = 'MTB';
$bike1->year = '2021';
$bike1->setWeight(6000);
echo $bike1->getInfo();
echo $bike1->getWeight();
echo $bike1->getWeight(true);


$bike2 = new Bicycle('New Bike');
$bike2->brand = 'Speialized';
$bike2->model = 'Roadibke';
$bike2->year = '2022';
$bike2->setWeight(4000);
echo $bike2->getInfo();
echo $bike2->getWeight();
echo $bike2->getWeight(true);

// echo '<pre>';
// var_dump($bike1);