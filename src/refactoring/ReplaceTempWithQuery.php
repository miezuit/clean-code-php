<?php


namespace victor\refactoring;


class ReplaceTempWithQuery // aka Order Line
{
    private int $quantity; //7.4.+
    private float $itemPrice;

    public function __construct(int $quantity, float $itemPrice)
    {
        $this->quantity = $quantity;
        $this->itemPrice = $itemPrice;
    }


    function computePrice() {
        $basePrice = $this->quantity * $this->itemPrice;
        if ($basePrice > 1000)
            return $basePrice * 0.95;
        else
            return $basePrice * 0.98;
    }
}

$price = (new ReplaceTempWithQuery(600, 0.5))->computePrice();
echo "Price: $price";