<?php


namespace victor\refactoring\hierarchy;


abstract class AbstractS {
    private int $x;
    function m() { echo $this->x;}
}
class A extends AbstractS {
    private int $y;
    function n() {}
}

class B extends AbstractS {
    private int $y;
}
class C extends AbstractS {
    function n() {}
}

