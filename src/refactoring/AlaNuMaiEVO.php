<?php


namespace victor\refactoring;


class AlaNuMaiEVO
{

}

class X{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }
    public function withX(int $newX):X {
        return new self($newX, $this->y);
    }

}