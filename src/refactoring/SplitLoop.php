<?php


namespace victor\refactoring;

class SplitLoop {
    /** @param Employee[] $employees */
    static function computeStats(array $employees) {
        $averageSalary = self::computeAverageSalary($employees);
        $averageAge = self::computeAverageAge($employees);
        echo "avg age = $averageAge\navg sal = $averageSalary\n";
    }

    public static function computeAverageSalary(array $employees): float
    {
        $totalSalary = 0;
        foreach ($employees as $employee) {
            $totalSalary += $employee->salary;
        }
        return $totalSalary / count($employees);
    }

    /**
     * @param array $employees
     * @return float|int
     */
    public static function computeAverageAge(array $employees)
    {
        $averageAge = 0;
        foreach ($employees as $e) {
            $averageAge += $e->age;
        }
        $averageAge = $averageAge / sizeof($employees);
        return $averageAge;
    }
}

SplitLoop::computeStats([new Employee(24, 1500), new Employee(30, 2500)]);


class Employee {
    public $age;
    public $salary;

    public function __construct(int $age, float $salary)
    {
        $this->age = $age;
        $this->salary = $salary;
    }
}