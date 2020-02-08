<?php


namespace victor\refactoring;


function f()
{
    echo "Line1f\n";
    echo "Line2\n";
    m2();
    echo "Line6f\n";
}

function g()
{
    echo "Line1g\n";
    echo "Line2\n";
    m2();
    echo "Line6g\n";
}

function m2(): void
{
    echo "Line3\n";
    echo "Line4\n";
    echo "Line5\n";
}

f();
echo "---\n";
g();