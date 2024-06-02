<?php
echo 'Ex. 2<br><hr>';

class Student {
    public $name;
    public $surname;
    public $country;
    private $tuition;
    protected $indexNumber;

    public function setTuition($tuition){
        $this->tuiton = $tuition;
    }

    public function setIndex($indexNumber){
        $this->indexNumber = $indexNumber;
    }

    public function getName(){
        return $this->name . '<br>';
    }
    public function getSurname(){
        return $this->surname . '<br>';
    }
    public function helloWorld(){
        return 'Hello World<br>';
    }
    protected function helloFamily(){
        return 'Hello Family<br>';
    }
    private function helloMe(){
        return 'Hello Me<br>';
    }
    private function getTuition(){
        return $this->tuition;
    }
    
}

class PartTimeStudent extends Student {
    public function helloParent(){
        return $this->helloFamily();
    }
}
echo '<pre>';
$student = new Student();
$student->name = 'John';
$student->surname = 'Doe';
$student->country = 'France';
$student->setTuition(15000);
$student->setIndex(123456);

echo $student->getName();
echo $student->getSurname();
echo $student->helloWorld();
var_dump($student);
echo '<hr>';

$partTimeStudent = new PartTimeStudent();
$partTimeStudent->name = 'Jane';
$partTimeStudent->surname = 'Doe';
$partTimeStudent->country = 'USA';
$partTimeStudent->setTuition(25000);
$partTimeStudent->setIndex(111223344);

echo $partTimeStudent->getName();
echo $partTimeStudent->getSurname();
echo $partTimeStudent->helloWorld();
echo $partTimeStudent->helloParent();

var_dump($partTimeStudent);