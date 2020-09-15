<?php


namespace victor\clean;


class UtilsVsVO
{
    public function filterCarModels(CarSearchCriteria $criteria, array $models)
    {
        $result = [];
        $criteriaInterval = new Interval($criteria->getStartYear(), $criteria->getEndYear());
//        $criteriaInterval = $criteria->getYearInterval();
        /** @var CarModel $model */
        foreach ($models as $model) {
            $modelInterval = new Interval($model->getStartYear(), $model->getEndYear());
            if ($modelInterval->intersects($criteriaInterval)) {
                $result [] = $model;
            }
        }

//        $customerIdToOrderIds = [ 1=> [new OrderId(1),2], 3=>[4,5]];
//        new CountryName("Romania");

        return $result;
    }
}
//class OrderId {
//    private int $id;
//}
//
//class Shipment {
//    private OrderId $orderId;
//}

class Interval { // value object
    private int $start;
    private int $end;

    public function __construct(int $start, int $end)
    {
        if ($start > $end) {
            throw new \Exception("INVALID_INTERVAL");
        }
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

    public function __toString()
    {
        return "Interval[$this->start, $this->end]";
    }

    public function equals(Interval $other): bool
    {
        return $this->start == $other->start && $this->end == $other->end;
    }
    public function intersects(Interval $other): bool
    {
        return $this->start <= $other->end
            && $other->start <= $this->end;
    }

}


class Immutable {
    private int $a;
    private B $b;
    private array $list;

    public function __construct(int $a, B $b, array $list)
    {
        $this->a = $a;
        $this->b = $b;
        $this->list = $list;
    }

    public function getA(): int
    {
        return $this->a;
    }
    public function getB(): B
    {
        return $this->b;
    }
    public function getList(): array
    {
        return $this->list;
    }

    public function withA(int $newA): Immutable
    {
        return new Immutable($newA, $this->b, $this->list);
    }
}
class B {
    private int $x;

    public function __construct(int $x)
    {
        $this->x = $x;
    }

    public function getX(): int
    {
        return $this->x;
    }
}

$arr = [1,2];
$i = new Immutable(1, new B(5), $arr);
//$i->getB()->x = 5;

$j = $i->withA(9);
$arr[]=3;
$arr[1]=5;
var_dump($i->getList());
var_dump($arr);


//var_dump((new Interval(1,2))->equals(new Interval(1,3)));

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

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function getEndYear(): int
    {
        return $this->endYear;
    }
}