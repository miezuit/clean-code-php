<?php


namespace victor\refactoring;

$boule = new BouleanParameters();
$boule->bigUglyMethod(1, 2, false);
$boule->bigUglyMethod(1, 2, false);
$boule->bigUglyMethod(1, 2, false);
$boule->bigUglyMethod(1, 2, false);
$boule->bigUglyMethod(1, 2, false);

// TODO GIGEL:  From my use-case, I call it too, to do more within:
$boule->bigUglyMethod(1, 2, true);

class BouleanParameters
{

    function bigUglyMethod(int $a, int $b, bool $gigel)
    {
        echo "Complex Logic\n";
        echo "Complex Logic\n";
        echo "Complex Logic\n";

        if ($gigel) {
            echo "Gigel: pun si eu aicea logica de care am eu nevoie";
        }

        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
    }


    // ============== "BOSS" LEVEL: A lot harder to break down =================

    function bossLevel(bool $stuff, bool $fluff, array $tasks)
    {
        $i = 0;
        $j = 1;
        echo "Logic1\n";
        if ($stuff) {
            echo "Logic2\n";
            if ($fluff) {
                echo "Logic3\n";
                foreach ($tasks as $task) {
                    $i++;
                    echo "Logic4 $task\n";
                    // TODO HERE, when call this method, I want MY own custom code to run here
                    echo "Logic5 $i\n";
                }
                echo "Logic6 " . $j++ . "\n";
            }
        }
        echo "Logic7 $j\n";
    }
}
