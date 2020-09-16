<?php


namespace victor\refactoring;

$boule = new BouleanParameters();
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);

// TODO From my use-case, I call it too, to do more within:
$boule->bigUglyMethod323(1, 2);


class BouleanParameters
{

    function bigUglyMethod(int $a, int $b)
    {
        // FIXME sss
        $this->beforeLogic();
        $this->afterLogic();
    }

    private function beforeLogic(): void
    {

        echo "Complex Logic\n";
        echo "Complex Logic\n";
        echo "Complex Logic\n";
    }

    private function afterLogic(): void
    {
        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
    }

    function bigUglyMethod323(int $a, int $b)
    {
        $this->beforeLogic();
        echo "Logica Mea pt UC323\n";
        $this->afterLogic();
    }


    // ============== "BOSS" LEVEL: A lot harder to break down =================

    function bossLevelStuffFluff(array $tasks)
    {
        echo "Logic1\n";
        echo "Logic2\n";
        echo "Logic3\n";

        foreach ($tasks as $task) {
            echo "Logic4 " . $task . "\n";
        }
        foreach ($tasks as $task) {
            // TODO HERE, when call this method, I want MY own custom code to run here
            echo "Extra Logic " . $task . "\n";
        }
        $i = 0;
        foreach ($tasks as $task) {
            $i++;
            echo "Logic5 " . $i . "\n";
        }
        echo "Logic6 " . 1 . "\n";
        echo "Logic7\n";
    }

    function bossLevelStuffNoFluff()
    {
        echo "Logic1\n";
        echo "Logic2\n";
        echo "Logic7\n";
    }

    function bossLevelNoStuff()
    {
        echo "Logic1\n";
        echo "Logic7\n";
    }

}
