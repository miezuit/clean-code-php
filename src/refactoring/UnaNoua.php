<?php


namespace victor\refactoring;


class C {
    const C_TYPE_1 = '1';

    static function parseDate($dateStr):String
    {
        return 'x';
    }

}
class UnaNoua
{

    function h():C {return new C();}
    function g()
    {
        $b = false;
        $this->functiaDesteapta(C::parseDate('a'), false);

        $c = new C();
        $this->functiaDesteapta('World', true, );
    }
    function functiaDesteapta(string $world, bool $cr323, C $c)
    {
        try {
            echo "Buna!\n";
            if ($cr323 || 1== 1 && 2 == 3) {
                echo 'Hello ' . $world;
            }
        } catch (\Exception $e) {
            echo "BUBA\n"; // shaworma
        }
    }
}