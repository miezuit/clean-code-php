<?php


namespace victor\refactoring;


class ReplacePrimitiveWithObject
{

    /**
     * @param Incident[] $incidents
     */
    function displayUrgent($incidents)
    {
        $incidents = array_filter($incidents,
            // over 'normal'
            fn(Incident $i) => $i->priority === "high" || $i->priority === "rush");

        /** @var Incident $incident */
        foreach ($incidents as $incident) {
            echo "Priority order: " . $incident->id;
        }
    }
}

class Incident
{
    public $id;
    public $priority;
}