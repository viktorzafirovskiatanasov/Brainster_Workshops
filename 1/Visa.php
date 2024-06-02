<?php

namespace Visa;

require_once __DIR__ . "/Card.php";

class DebitCard extends \Banking\Card
{
    private $defaultDiscount = 3;

    public function __construct($pan, $balance)
    {
        parent::__construct($pan, $balance, $this->defaultDiscount);
    }

    public function payment($expenses)
    {
        if ($expenses > 6000) {
            $this->setDiscount(10);
        } else {
            $this->setDiscount($this->defaultDiscount);
        }

        parent::payment($expenses);
    }
}
