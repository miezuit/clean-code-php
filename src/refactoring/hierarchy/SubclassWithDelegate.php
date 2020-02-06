<?php


namespace victor\refactoring\hierarchy;


class Order
{
    private $warehouse;

// TODO if delegate != null -> delegate.priortityPlan...
    function daysToShip(): int
    {
        return $this->warehouse->daysToShip;
    }
}

class PriorityOrder extends Order
{
    private $priorityPlan;

    public function daysToShip(): int
    {
        return $this->priorityPlan->daysToShip;
    }
}