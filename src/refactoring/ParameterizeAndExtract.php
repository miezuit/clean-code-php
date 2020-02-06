<?php


namespace victor\refactoring;

class ParameterizeAndExtract
{

//    TODO: Extract Var > Extract Func > Inline Var > Replace others with call
    function f()
    {
        echo "Logica f\n";
        $this->m(4);
    }

    function g()
    {
        echo "Logica g\n";
        $this->m(3);
    }

    function alta()
    {

    }

    /**
     * @param int $n
     */
    public function m(int $n): void
    {
        for ($i = 0; $i < $n; $i++) {

            echo "Cod $i\n";
        }
    }

}