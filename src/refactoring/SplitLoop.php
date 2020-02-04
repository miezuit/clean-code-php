<?php


namespace victor\refactoring;


/** @var Employee[] $employees */
$employees = [new Employee(24, 1500), new Employee(30, 2500)];
$averageAge = 0;
$totalSalary = 0;
foreach ($employees as $e) {
    $averageAge += $e->age;
    $totalSalary += $e->salary;
}
$averageAge = $averageAge / sizeof($employees);
$averageSalary = $totalSalary / sizeof($employees);

echo "avg age = $averageAge\navg sal = $averageSalary\n";


class Employee {
    public $age;
    public $salary;

    public function __construct(int $age, float $salary)
    {
        $this->age = $age;
        $this->salary = $salary;
    }
}