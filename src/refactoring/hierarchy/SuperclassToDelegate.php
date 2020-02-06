<?php


namespace victor\refactoring\hierarchy;


class Rectangle {
    private int $width;
    private int $height;

    public function getWidth(): int
    {
        return $this->width;
    }
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }
    public function getHeight(): int
    {
        return $this->height;
    }
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    function area(): int
    {
        return $this->width * $this->height;
    }

    function perimeter(): int
    {
        return $this->width * 2 + $this->height * 2;
    }
}

class Square { // TODO

}

// TODO area of a square

