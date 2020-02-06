<?php


namespace victor\refactoring;


function f()
{
    echo "Line1f\n";
    m2();
    echo "Line6f\n";
}

function g()
{
    echo "Line1g\n";
    m2();
    echo "Line6g\n";
}

function m2(): void
{
    echo "Line2\n";
    echo "Line3\n";
    echo "Line4\n";
    echo "Line5\n";
}

f();
echo "---\n";
g();