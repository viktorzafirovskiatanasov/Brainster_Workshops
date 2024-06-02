<?php
echo 'Ex. 4<br><hr>';

interface HasInfo {
    public function getInfo();
}

class Address implements HasInfo {
    public $street;
    public $number;
    public $city;

    public function __construct($street, $number, $city){
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    public function getInfo(){
        return "Address: street {$this->street}, number {$this->number}, city {$this->city}<br>";
    }
}

class Phone implements HasInfo{
    public $prefix;
    public $phoneNumber;

    public function __construct($prefix, $phoneNumber){
        $this->prefix = $prefix;
        $this->phoneNumber = $phoneNumber;
    }

    public function getInfo(){
        return "Phone Number: {$this->prefix}/{$this->phoneNumber}<br>";
    }
}

class User implements HasInfo {
    public $name;
    public $surname;
    private $address;
    private $phone;

    public function __construct($name, $surname){
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getInfo(){
        return "User: {$this->name} {$this->surname}<br>
        {$this->address->getInfo()}
        {$this->phone->getInfo()}";
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public static function sayHi(){
        echo 'Hello!!';
    }
}

// $address = new Address('Some street', 13546, 'Some City');

// $phone = new Phone(70, 123456);

// $user = new User('Jane', 'Doe');
// $user->setAddress($address);
// $user->setPhone($phone);

// echo $user->getInfo();
// var_dump($user);

User::sayHi();
