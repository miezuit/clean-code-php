<?php


namespace victor\refactoring;


class EncapsulateConditionals
{
    // TODO encapsulate fields
    // TODO move method
    public function getQuote(\DateTime $dateTime, RatesPlan $plan, int $quantity, float $clientFidelityFactor): float
    {
        if ((!$dateTime < $plan->summerStart) && !$dateTime > $plan->summerEnd)
            $charge = $quantity * $plan->summerRate;
        else
            $charge = $quantity * $plan->regularRate + $plan->regularServiceCharge;
        return $charge - $clientFidelityFactor;
    }

}

class Client {
    private $fidelityFactor;
    public function getFidelityFactor(): float
    {
        return $this->fidelityFactor;
    }
}

class RatesPlan {

    public $summerStart;
    public $summerRate;
    public $regularRate;
    public $regularServiceCharge;
    public $summerEnd;
}