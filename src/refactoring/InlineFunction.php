<?php


namespace victor\refactoring;


class InlineFunction
{
    function getRating($driver): int {
        return $this->moreThanFiveLateDeliveries($driver) ? 2 : 1;
    }
    function moreThanFiveLateDeliveries($driver): bool {
        return $driver->numberOfLateDeliveries > 5;
    }
}