<?php


namespace victor\refactoring;

$boule = new BouleanParameters();
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);
$boule->bigUglyMethod(1, 2);

// TODO GIGEL:  From my use-case, I call it too, to do more within:
$boule->bigUglyMethodGigel(1, 2);


class BouleanParameters
{

    function bigUglyMethod(int $a, int $b)
    {
        $this->beforeLogic();
        $this->afterLogic();
    }

    public function beforeLogic(): int
    {
        echo "Complex Logic\n";
        echo "Complex Logic\n";
        echo "Complex Logic\n";
        return 1;
    }


    // ============== "BOSS" LEVEL: A lot harder to break down =================

    public function afterLogic(): void
    {
        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
        echo "More Complex Logic\n";
    }

    function bigUglyMethodGigel(int $a, int $b)
    {
        $this->beforeLogic();
        $this->gigelMethod();
        $this->afterLogic();
    }

    public function gigelMethod(): void
    {
        echo "Gigel: pun si eu aicea logica de care am eu nevoie";
        echo "Gigel: pun si eu aicea logica de care am eu nevoie";
        echo "Gigel: pun si eu aicea logica de care am eu nevoie";
    }

    function bossLevelStuffFluff(array $tasks)
    {
        $i = 0;
        $j = 1;
        echo "Logic1\n";
        echo "Logic2\n";
        echo "Logic3\n";
        foreach ($tasks as $task) {
            $i++;
            echo "Logic4 $task\n";
            // TODO HERE, when call this method, I want MY own custom code to run here
            echo "Logic5 $i\n";
        }
        echo "Logic6 " . $j++ . "\n";
        echo "Logic7 $j\n";
    }
    function bossLevelStuffNoFluff(array $tasks)
    {
        $i = 0;
        $j = 1;
        echo "Logic1\n";
        echo "Logic2\n";
        echo "Logic7 $j\n";
    }

    function bossLevelNoStuff(bool $fluff, array $tasks)
    {
        $i = 0;
        $j = 1;
        echo "Logic1\n";
        echo "Logic7 $j\n";
    }
}
