<?php
echo 'Ex. 3<br><hr>';

class Product {
     private $desc;
     private $quantity;
     private $price;

     public function __construct($desc, $qty, $price){
          if(!is_string($desc)){
               echo 'Description is not a string!';
               return false;
          }
          if(!is_int($qty)){
               echo 'Quantity is not an integer!';
               return false;
          }
          if(!is_numeric($price)){
               echo 'Quantity is not numeric!';
               return false;
          }
          $this->desc = $desc;
          $this->quantity = $qty;
          $this->price = $price;
     }

     public function getDesc(){
          return $this->desc;
     }
     public function setDesc($desc){
          $this->desc = $desc;
     }

     public function getQty(){
          return $this->quantity;
     }
     public function setQty($qty){
          $this->quantity = $qty;
     }

     public function getPrice(){
          return $this->price;
     }
     public function setPrice($price){
          $this->price = $price;
     }

     public function calculate(){
          return $this->quantity * $this->price;
     }
}


$product = new Product('Some Product', 30, 500);
echo $product->calculate() . '<hr>';

$product->setPrice(15);
echo $product->calculate() . '<hr>';

$product->setQty(300);
echo $product->calculate() . '<hr>';