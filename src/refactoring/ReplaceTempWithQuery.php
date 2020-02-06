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
        if ($this->calculateBasePrice() > 1000)
            return $this->calculateBasePrice() * 0.95;
        else
            return $this->calculateBasePrice() * 0.98;
    }

    /**
     * @return float|int
     */
    private function calculateBasePrice()
    {
        return $this->quantity * $this->itemPrice;
    }
}

$price = (new ReplaceTempWithQuery(600, 0.5))->computePrice();
echo "Price: $price";