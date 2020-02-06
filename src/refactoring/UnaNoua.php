<?php


namespace victor\refactoring;


class UnaNoua
{
    function g()
    {
        $this->functiaDesteapta('World', false);

        $this->functiaDesteapta('World', true);
    }
    function functiaDesteapta(string $world, bool $cr323)
    {
        try {
            echo "Buna!\n";
            if ($cr323) {
                echo 'Hello ' . $world;
            }
        } catch (\Exception $e) {
            echo "BUBA\n"; // shaworma
        }
    }
}