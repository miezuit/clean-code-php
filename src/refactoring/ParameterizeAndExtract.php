<?php


namespace victor\refactoring;

class ParameterizeAndExtract
{

//    TODO: Extract Var > Extract Func > Inline Var > Replace others with call
    function f()
    {
        echo "Logica f\n";
        for ($i = 0; $i < 4; $i++) {
            echo "Cod $i\n";
        }
    }

    function g()
    {
        echo "Logica g\n";
        for ($i = 0; $i < 3; $i++) {
            echo "Cod $i\n";
        }
    }

    function alta()
    {

    }

}