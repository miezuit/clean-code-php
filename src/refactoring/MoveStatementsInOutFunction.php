<?php


namespace victor\refactoring;


function f()
{
    echo "Line1f\n";
    if ($b) {
        echo "Line3";
    } else {
        echo "Line4";
    }
    echo "Line5f\n";
    echo "Line6f\n";
}

function g()
{
    echo "Line1g\n";
    if ($b) {
        echo "Line3";
    } else {
        echo "Line4";
    }
    echo "Line5g\n";
    echo "Line6g\n";
}

function m(): void
{
    echo "Line2\n";
    echo "Line3\n";
    echo "Line4\n";
}

f();
echo "---\n";
g();