<?php


namespace victor\refactoring;



class NullObject
{
    public static function process(ICustomer $customer)
    {

        // x 7 locuri:
        $customerName = $customer->getName();
        // ...
    }
}

NullObject::process(new Customer("John Doe"));
NullObject::process(new MissingCustomer());

interface ICustomer {
    public function getName();
}
class MissingCustomer implements ICustomer {
    public function getName()
    {
        return "occupant";
    }
}
class Customer implements ICustomer
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
