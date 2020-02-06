<?php


namespace victor\refactoring;


class SeparateQueryCommand
{


    function alertForMiscreant(array $people)
    {
        $miscreant = $this->searchMiscreant($people);
        if (!empty($miscreant)) {
            $this->setOffAlarms();
        }
        return $miscreant;
    }
    private function searchMiscreant(array $people)
    {
        foreach ($people as $person) {
            if ($person === "Don") {
//                $this->setOffAlarms();
                return "Don";
            }
            if ($person === "John") {
//                $this->setOffAlarms();
                return "John";
            }
        }
        return null;
    }

    private function setOffAlarms()
    {
        echo "Side effects\n";
    }

}