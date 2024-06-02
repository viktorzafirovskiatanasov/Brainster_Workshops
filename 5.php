<?php
echo 'Ex. 5<br><hr>';


class User {
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    public function __construct($name, $surname, $username){
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    public function isAdmin(){
        echo $this->is_admin ? 'User is admin' : 'User is not an admin';
    }

    public function print(){
        echo $this->name . ' ' . $this->surname . ' ';
        if($this->is_admin){
            echo ' (admin)';
        }
    }
}

class Customer extends User {
    private $city;
    private $state;
    private $country;

    public function __construct($name, $surname, $username){
        parent::__construct($name, $surname, $username);
    }

    public function setCity($city){
        $this->city = $city;
    }
    public function getCity(){
        return $this->city;
    }

    public function setState($state){
        $this->state = $state;
    }
    public function getState(){
        return  $this->state;
    }

    public function setCountry($country){
        $this->country = $country;
    }
    public function getCountry(){
        return  $this->country;
    }

    public function location(){
        return "{$this->city}, {$this->state}, {$this->country}";
    }

    public function print(){
        parent::print();
        echo $this->location();
    }
}

class AdminUser extends User{
    public function __construct($name, $surname, $username){
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }
}

$user = new User('John', 'Doe', 'johnny123');

$admin = new AdminUser('Jane', 'Doe', 'Jenny1234');

$customer = new Customer('Alice', 'Button', 'Alice998712');
$customer->setCity('Las Vegas');
$customer->setState('Nevada');
$customer->setCountry('USA');


$people = [$user, $admin, $customer];


// $user->print();
// echo '<hr>';
// $admin->print();
// echo '<hr>';
// $customer->print();

// $user->print();
// echo '<hr>';
// $admin->print();
// echo '<hr>';
// $customer->print();

foreach($people as $person){
    $person->isAdmin() . '<hr>';

}