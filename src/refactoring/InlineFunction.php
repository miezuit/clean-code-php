<?php


namespace victor\refactoring;


class InlineFunction
{
    function getRating($driver): int {
        return $driver->numberOfLateDeliveries > 5 ? 2 : 1;
    }

}