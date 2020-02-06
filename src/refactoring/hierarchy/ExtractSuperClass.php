<?php


namespace victor\refactoring\hierarchy;


class S {}
class A {
    private int $x;
    private int $y;
    function m() {echo $this->x;}
    function n() {}
}

class B {
    private int $x;
    private int $y;
    function m() {echo $this->x;}
}
class C {
    private int $x;
    function m() {echo $this->x;}
    function n() {}
}

