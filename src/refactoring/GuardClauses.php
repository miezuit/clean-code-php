<?php


namespace victor\refactoring;


class GuardClauses
{
    private $isDead = false;
    private $isSeparated = false;
    private $isRetired = false;

    function getPayAmount()
    {
        if ($this->isDead)
            $result = $this->deadAmount();
        else {
            if ($this->isSeparated)
                $result = $this->separatedAmount();
            else {
                if ($this->isRetired)
                    $result = $this->retiredAmount();
                else
                    $result = $this->normalPayAmount();
            }
        }
        return $result;
    }

    private function deadAmount()
    {
        return 1;
    }

    private function separatedAmount()
    {
        return 3;
    }

    private function retiredAmount()
    {
        return 2;
    }

    private function normalPayAmount()
    {
        return 4;
    }

}