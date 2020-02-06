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
    public function setHeight(int $h): void
    {
        $this->height = $h;
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

class Square extends Rectangle { // TODO
    public function setHeight(int $h): void
    {
        parent::setWidth($h);
        parent::setHeight($h);
    }
    public function setWidth(int $w): void
    {
        parent::setWidth($w);
        parent::setHeight($w);
    }
}

// TODO area of a square
m(new Rectangle());
m(new Square());

function m(Rectangle $rectangle)
{
    $rectangle->setHeight(2);
    $rectangle->setWidth(3);
    echo $rectangle->area() . "\n";
}
