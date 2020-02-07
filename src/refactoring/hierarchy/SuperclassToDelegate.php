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
        //50 de linii de cod de biz de feed processing peste SHA512 + sjdakj
        return $this->width * $this->height;
    }

    function perimeter(): int
    {
        return $this->width * 2 + $this->height * 2;
    }
}

class Square { // TODO
    private Rectangle $rectangle;
    public function __construct()
    {
        $this->rectangle = new Rectangle();
    }

    public function setEdge(int $e): void
    {
        $this->rectangle->setWidth($e);
        $this->rectangle->setHeight($e);
    }

    public function area(): int
    {
        return $this->rectangle->area();
    }
}

// TODO area of a square
m(new Rectangle());
m2(new Square());

function m(Rectangle $rectangle)
{
    $rectangle->setHeight(2);
    $rectangle->setWidth(3);
    echo $rectangle->area() . "\n";
}
function m2(Square $s)
{
    $s->setEdge(2);
    echo $s->area() . "\n";
}
