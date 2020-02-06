<?php


namespace victor\refactoring;


class GuardClauses
{
    private $isDead = false;
    private $isSeparated = false;
    private $isRetired = false;

    function getPayAmount()
    {
        if ($this->isDead) {
            return $this->deadAmount();
        }
        if ($this->isSeparated) {
            return $this->separatedAmount();
        }
        if ($this->isRetired) {
            return $this->retiredAmount();
        } else {
            return $this->normalPayAmount();
        }
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