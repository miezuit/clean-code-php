<?php


namespace victor\clean;

class FullName {
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        if ($firstName === '' || $lastName === '') {
            throw new \Exception();
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function seMarita(string $numeleSotului): FullName
    {
        return new static($this->firstName, $numeleSotului);
    }

    public function format(): string
    {
        return $this->firstName . ' ' . strtoupper($this->lastName);
    }
}
class Address {
    private string $city;
    private string $streetName;
    private int $streetNumber;

    public function __construct(string $city, string $streetName, int $streetNumber)
    {
        $this->city = $city;
        $this->streetName = $streetName;
        $this->streetNumber = $streetNumber;
    }

}
class ManyParamsVO
{
    public function placeOrder(FullName $fullName, Address $address)
    {
        echo "Some logic \n";
    }
}

$fullName = new FullName('John', 'Doe');
$address = new Address('St. Albergue', 'Paris', 99);
(new ManyParamsVO())->placeOrder($fullName, $address);

class AnotherClass {
    public function otherMethod(FullName $fullName, int $x) {
    	echo "Another distant Logic";
    }
}

// pachetul entity
class Person {
    private $id;
    private FullName $fullName;
    private $phone;

    public function __construct(string $firstName, string $lastName)
    {
        $this->fullName = new FullName($firstName, $lastName);
    }

    public function getFullName(): FullName
    {
        return $this->fullName;
    }


    //level 2
    public function setLastName(string $lastName): void
    {
        $this->fullName = $this->fullName->seMarita($lastName);
    }

}

class PersonService {
    public function f(Person $person) {
        $fullName = $person->getFullName()->format();
        echo $fullName;
    }
    public function p(string $city, string $streetName, int $streetNumber) {
        echo "Living in " . $city . " on St. " . $streetName . " " . $streetNumber;
    }

}