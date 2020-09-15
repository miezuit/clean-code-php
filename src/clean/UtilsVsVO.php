<?php


namespace victor\clean;


class UtilsVsVO
{
    public function filterCarModels(CarSearchCriteria $criteria, array $models)
    {
        $result = [];
        /** @var CarModel $model */
        foreach ($models as $model) {
            if (MathUtil::intervalsIntersect(
                $model->getStartYear(), $model->getEndYear(),
                $criteria->getStartYear(), $criteria->getEndYear())) {

                $result [] = $model;
            }
        }
        return $result;
    }
}

class Interval { // value object
    private int $start;
    private int $end;

    public function __construct(int $start, int $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    public function getEnd(): int
    {
        return $this->end;
    }
    public function getStart(): int
    {
        return $this->start;
    }

    public function equals(Interval $other): bool
    {
        return $this->start == $other->start && $this->end == $other->end;
    }
}


//var_dump((new Interval(1,2))->equals(new Interval(1,3)));

class MathUtil {

    public static function intervalsIntersect(int $start1, int $end1, int $start2, int $end2): bool
    {
        return $start1 <= $end2 && $start2 <= $end1;
    }
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

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function getEndYear(): int
    {
        return $this->endYear;
    }
}