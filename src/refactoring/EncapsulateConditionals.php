<?php


namespace victor\refactoring;


class EncapsulateConditionals
{
    // TODO encapsulate fields
    // TODO move method
    public function getQuote(\DateTime $dateTime, RatesPlan $plan, int $quantity, float $clientFidelityFactor): float
    {
        if ($plan->isSummer($dateTime))
            $charge = $plan->computeSummerPlan($quantity);
        else
            $charge = $plan->computeExtraSeasonCharge($quantity);
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

    public function isSummer(\DateTime $dateTime): bool
    {
        return (!$dateTime < $this->summerStart)
            && !$dateTime > $this->summerEnd;
    }

    public function computeSummerPlan(int $quantity): float
    {
        return $quantity * $this->summerRate;
    }

    public function computeExtraSeasonCharge(int $quantity)
    {
        return $quantity * $this->regularRate + $this->regularServiceCharge;
    }
}