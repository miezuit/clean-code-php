<?php


namespace victor\refactoring;


use victor\clean\Person;

class SplitVariable
{
    function discount($inputValue, $quantity)
    {
        $valueDiscount = $inputValue > 50 ? 2 : 0;
        $volumeDiscount = $quantity > 100 ? 1 : 0;
        return $inputValue - $valueDiscount - $volumeDiscount;
    }

}