<?php

class Calculator
{
    private $operations = [];

    public function add($a, $b){
        $res = $a + $b;
        $operation = ['operation' => 'Adding ', 'a' => $a, 'b' => $b, 'result' => $res];
        // $this->log(['operation' => 'Adding ', 'a' => $a, 'b' => $b, 'result' => $res]);
        $this->log($operation);
    }

    public function subtract($a, $b){
        $res = $a - $b;
        $operation = ['operation' => 'Subtracting ', 'a' => $a, 'b' => $b, 'result' => $res];

        $this->log($operation);
    }

    public function multiply($a, $b){
        $res = $a * $b;
        $operation = ['operation' => 'Multiplying ', 'a' => $a, 'b' => $b, 'result' => $res];

        $this->log($operation);
    }

    public function divide($a, $b){
        if(!$b){
            $this->log(['operation' => 'Cannot divide with zero.', 'a' => 0, 'b' => 0, 'result' => 0]);
            return 0;
        }
        $res = $a / $b;
        $operation = ['operation' => 'Dividing ', 'a' => $a, 'b' => $b, 'result' => $res];

        $this->log($operation);
    }

    private function log($operation){
        $this->operations[] = $operation;
    }

    public function print(){
        $msg = 'No operations are logged yet.<br>';
        if(count($this->operations)){
            $msg = '';
            foreach($this->operations as $op){
                $msg .= $op['operation'] . $op['a'] . ' and ' . $op['b'] . '. Result: ' . $op['result'] . '.<br>';
            }
        }
        return $msg;
    }
//Adding 2 and 5. Result: 7.

    public function clearLogs(){
        $this->operations = [];
    }
}