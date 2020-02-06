<?php


namespace victor\clean;


class UtilsVsVO
{
    public function filterCarModels(CarSearchCriteria $criteria, array $models)
    {
        $result = [];
        /** @var CarModel $model */
        foreach ($models as $model) {
            if ($model->getYearInterval()->intersects($criteria->getYearInterval())) {
                $result [] = $model;
            }
        }
        return $result;
    }

}

class Interval {
    private $start;
    private $end;

    public function __construct(int $start, int $end)
    {
        if ($start > $end) throw new \Exception("start larger than end");
        $this->start = $start;
        $this->end = $end;
    }

    public function intersects(Interval $other): bool
    {
        return $this->getStart() <= $other->getEnd()
            && $other->getStart() <= $this->getEnd();
    }

    public function getStart(): int
    {
        return $this->start;
    }
    public function getEnd(): int
    {
        return $this->end;
    }
}

class MathUtil {

}


class CarSearchCriteria
{
    private $yearInterval;

    public function __construct(int $startYear, int $endYear)
    {
        $this->yearInterval = new Interval($startYear, $endYear);
    }
    public function getYearInterval(): Interval
    {
        return $this->yearInterval;
    }
}


class CarModel
{
    private $make;
    private $model;
    private $yearInterval;

    public function __construct(int $startYear, int $endYear, string $model, string $make)
    {
        if ($startYear > $endYear) throw new \Exception("start larger than end");
        $this->yearInterval = new Interval($startYear, $endYear);

        $this->model = $model;
        $this->make = $make;
    }

    public function getYearInterval(): Interval
    {
        return $this->yearInterval;
    }

}