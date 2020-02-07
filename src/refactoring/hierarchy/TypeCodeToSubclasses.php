<?php


namespace victor\refactoring\hierarchy;


class MusicalEvent extends AbstractTheatreEvent
{

    public function getType(): string
    {
        return "MUSICAL";
    }

    public function minimumAge(): int
    {
        return 6;
    }

    public function basePrice(): float
    {
        return 60 + 10 * $this->isWeekend();
    }
}

class ComedyEvent extends AbstractTheatreEvent
{
    private bool $adultComedy;

    public function getType(): string
    {
        return "COMEDY";
    }

    public function minimumAge(): int
    {
        return $this->adultComedy ? 18 : ($this->duration > 120 ? 9 : 7);
    }

    public function basePrice(): float
    {
        return 50 - 5 * $this->adultComedy;
    }
}

class DramaEvent extends AbstractTheatreEvent
{

    public function canLeaveEarly()
    {
        return false;
    }
    public function getType(): string
    {
        return "DRAMA";
    }

    public function minimumAge(): int
    {
       return 10;
    }

    public function basePrice(): float
    {
        return 40 + 5 * $this->isWeekend();
    }
}

//class PtBabaciuniLaPensieCuTalonEvent extends AbstractTheatreEvent
//{
//
//    public function getType(): string
//    {
//        // TODO: Implement getType() method.
//    }
//
//    public function minimumAge(): int
//    {
//        // TODO: Implement minimumAge() method.
//    }
//
//    public function basePrice(): float
//    {
//        return 0;
//    }
//}

abstract class AbstractTheatreEvent {

    private string $title;
    protected int $duration;
    private int $weekDay;

    public abstract function getType(): string;
    public abstract function minimumAge(): int;

    public function canLeaveEarly(): bool
    {
        return true;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    function isWeekend(): bool
    {
        return $this->weekDay >= 6;
    }

    public abstract function basePrice(): float;
}

$b = true;
echo ($b * 10 + 10);