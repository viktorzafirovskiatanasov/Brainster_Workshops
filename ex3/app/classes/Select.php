<?php

class Select 
{
    private $name;
    private $values = [];

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setValues(array $vals){
        $this->values = $vals;
    }

    public function makeOptions(){
        $options = '';

        foreach($this->values as $value){
            $options .= '<option value="' . strtolower($value) . '">' . $value . '</option>';
        }

        return $options;
        //
    }

    public function makeSelect(){
        return '<div>
                    <label for="' . $this->getName() . '">' . $this->getName() . '</label>
                    <select name="' . $this->getName() . '" id="' . $this->getName() . '">' . $this->makeOptions() . '</select>
                </div>';
    }
}   