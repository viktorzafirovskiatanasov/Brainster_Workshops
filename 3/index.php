<?php

require_once __DIR__ . "/classes/Person.php";
require_once __DIR__ . "/classes/wardrobe/Shirt.php";
require_once __DIR__ . "/classes/wardrobe/Skirt.php";
require_once __DIR__ . "/classes/wardrobe/Trousers.php";

use App\Person;
use Wardrobe\Shirt;
use Wardrobe\Trousers;
use Wardrobe\Skirt;

$person1 = new Person("Jane", "Doe", "female");
$person1->print();

echo "<hr />";

$shirt = new Shirt("M", "black", "short");
$person1->addToWardrobe($shirt);

$shirt2 = new Shirt("L", "green", "long");
$person1->addToWardrobe($shirt2);

$skirt = new Skirt("S", "red", 40);
$person1->addToWardrobe($skirt);

$trousers = new Trousers("L", "purple", "capri");
$person1->addToWardrobe($trousers);

$person1->orderWardrobe();
$person1->print();
