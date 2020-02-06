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
            fn(Incident $i) => $i->priority->moreSevereThan(Priority::normal()));

        /** @var Incident $incident */
        foreach ($incidents as $incident) {
            echo "Priority order: " . $incident->id;
        }
    }
}

(new ReplacePrimitiveWithObject())->displayUrgent([new Incident(1, new Priority("XX"))]);
echo "Am trait";

class Priority {
    const PRIORITY_LEVELS_IN_ORDER = ['low'=>1,'normal'=>2, 'high'=>3,'rush'=>4];
    private string $name;

    public function __construct(string $name)
    {
//        if (isset(self::PRIORITY_LEVELS_IN_ORDER[$name]));
        $this->name = $name;
    }

    public static function normal()
    {
        return new Priority('normal');
    }

    public function moreSevereThan(Priority $other)
    {
        return $this->index() > $other->index();
    }

    private function index()
    {
        return self::PRIORITY_LEVELS_IN_ORDER[$this->name];
    }
}

class Incident
{
    public $id;
    public Priority $priority;

    public function __construct($id, Priority $priority)
    {
        $this->id = $id;
        $this->priority = $priority;
    }

}