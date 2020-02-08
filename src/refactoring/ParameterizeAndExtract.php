<?php


namespace victor\refactoring;

class ParameterizeAndExtract {

    function f() {
        echo "Logica f\n";
        for ($i = 0; $i < 4; $i++) {
            echo "Cod $i\n";
        }
    }
    function g() {
        echo "Logica g\n";
        for ($i = 0; $i < 3; $i++) {
            echo "Cod $i\n";
        }
    }

}