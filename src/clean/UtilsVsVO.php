<?php


namespace victor\clean;


class UtilsVsVO
{
    public function filterCarModels(CarSearchCriteria $criteria, array $models)
    {
        $result = [];
        /** @var CarModel $model */
        foreach ($models as $model) {
            $criteriaInterval = new Interval($criteria->getStartYear(), $criteria->getEndYear());
            if ($model->getYearInterval()->intersects($criteriaInterval)) {
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
    private $startYear;
    private $endYear;

    public function __construct(int $startYear, int $endYear)
    {
        if ($startYear > $endYear) throw new \Exception("start larger than end");
        $this->startYear = $startYear;
        $this->endYear = $endYear;
    }

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function getEndYear(): int
    {
        return $this->endYear;
    }
}


class CarModel
{
    private $make;
    private $model;
    private $startYear;
    private $endYear;

    public function __construct(int $startYear, int $endYear, string $model, string $make)
    {
        if ($startYear > $endYear) throw new \Exception("start larger than end");
        $this->startYear = $startYear;
        $this->endYear = $endYear;
        $this->model = $model;
        $this->make = $make;
    }

    public function getYearInterval(): Interval
    {
        return new Interval($this->startYear, $this->endYear);
    }

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function getEndYear(): int
    {
        return $this->endYear;
    }
}