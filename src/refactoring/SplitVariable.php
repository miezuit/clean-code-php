<?php


namespace victor\refactoring;


use victor\clean\Person;

class SplitVariable
{
    function discount($inputValue, $quantity)
    {
        if ($inputValue > 50) $inputValue = $inputValue - 2;
        if ($quantity > 100) $inputValue = $inputValue - 1;
        return $inputValue;
    }

    function distanceTravelled($scenario, $time)
    {
        $acc = $scenario->primaryForce / $scenario->mass;
        $primaryTime = min($time, $scenario->delay);
        $result = 0.5 * $acc * $primaryTime * $primaryTime;
        $secondaryTime = $time - $scenario->delay;
        if ($secondaryTime > 0) {
            $primaryVelocity = $acc * $scenario->delay;
            $acc = ($scenario->primaryForce + $scenario->secondaryForce) / $scenario->mass;
            $result += $primaryVelocity * $secondaryTime + 0.5 * $acc * $secondaryTime * $secondaryTime;
        }
        return $result;
    }
}