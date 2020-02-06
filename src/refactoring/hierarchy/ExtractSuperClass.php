<?php


namespace victor\refactoring\hierarchy;


abstract class AbstractS {
    protected int $manager;
    protected int $em;

    function m()
    {
        echo $this->em;
    }
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

