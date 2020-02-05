<?php


namespace victor\refactoring;



class NullObject
{
    public static function process(?Customer $customer)
    {
        if ($customer == null) {
            $customerName = "occupant";
        }
        else {
            $customerName = $customer->getName();
        }
        // ...
    }
}

NullObject::process(new Customer("John Doe"));
NullObject::process(null);

class Customer
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
