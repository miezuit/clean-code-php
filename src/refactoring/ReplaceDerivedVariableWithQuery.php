<?php


namespace victor\refactoring;


class Cheese
{
    private int $discountedTotal;
    private int $discount = 0;
    public function __construct(int $basePrice)
    {
        $this->discountedTotal = $basePrice;
    }

    function discountedTotal(): int
    {
        return $this->discountedTotal;
    }

    function discount(int $aNumber):void
    {
        $old = $this->discount;
        $this->discount = $aNumber;
        $this->discountedTotal += $old - $aNumber;
    }
}

$cheese = new Cheese(10);
echo "New Cheese Price: " . $cheese->discountedTotal() . "\n";
$cheese->discount(1);
echo "Old Cheese Price: " . $cheese->discountedTotal() . "\n";