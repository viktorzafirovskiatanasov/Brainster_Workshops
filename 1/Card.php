<?php

namespace Banking;

abstract class Card
{
    protected $pan;
    private $discount;
    protected $balance;

    public function __construct($pan, $balance, $discount = 5)
    {
        $this->pan = $pan;
        $this->discount = $discount;
        $this->balance = $balance;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function printInfo()
    {
        return "{$this->pan} {$this->balance}";
    }

    public function withdraw($amount)
    {
        if ($this->balance > $amount) {
            $this->balance = $this->balance - $amount;
            return true;
        }

        return false;
    }

    public function payment($expenses)
    {
        $discountedExpense = $expenses - ($expenses * $this->discount / 100);

        $oldBalance = $this->balance;

        $classname = get_class($this);
        $classname = explode("\\", $classname);
        $cardname = $classname[0];

        if ($this->withdraw($discountedExpense)) {
            echo "$cardname payment: $oldBalance - $discountedExpense = {$this->balance}<br />";
        } else {
            echo "Not enough money. To pay: $discountedExpense, balance: {$this->balance}<br />";
        }
    }
}
