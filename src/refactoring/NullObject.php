<?php


namespace victor\refactoring;



class NullObject
{
    public function process(?Customer $customer)
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
class Customer
{

    public function getName()
    {
        return "blah";
    }
}
