<?php


namespace victor\refactoring\hierarchy;


class TheatreEvent {
    const TYPE_MUSICAL = "MUSICAL";
    const TYPE_DRAMA = "DRAMA";
    const TYPE_COMEDY = "COMEDY";

    private string $title;
    private int $duration;
    private int $weekDay;
    private int $type;
    private bool $adultComedy;

    public function getTitle(): string
    {
        return $this->title;
    }

    function minimumAge(): int
    {
        switch ($this->type) {
            case self::TYPE_MUSICAL:
                return 6;
            case self::TYPE_DRAMA:
                return 10;
            case self::TYPE_COMEDY:
                return $this->adultComedy ? 18 : ($this->duration > 120 ? 9 : 7);
        }
    }

    function isWeekend(): bool
    {
        return $this->weekDay >= 6;
    }

    function basePrice(): float
    {
        switch ($this->type) {
            case self::TYPE_MUSICAL:
                return 60 + 10 * $this->isWeekend();
            case self::TYPE_DRAMA:
                return 40 + 5 * $this->isWeekend();
            case self::TYPE_COMEDY:
                return 50 - 5 * $this->adultComedy;
        }
        return 0;
    }
}

$b = true;
echo ($b * 10 + 10);