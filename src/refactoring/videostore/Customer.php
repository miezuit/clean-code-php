<?php

namespace victor\refactoring\videostore;

class Customer
{
    private string $name;

    /** @var Rental[] */
    private array $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $rentals = $this->rentals;
        $result = 'Rental Record for ' . $this->getName() . "\n";

        foreach ($rentals as $each) {
            $thisAmount = 0;

            // determines the amount for each line
            switch ($each->getMovie()->getPriceCode()) {
                case Movie::PRICE_CODE_REGULAR:
                    $thisAmount += 2;
                    if ($each->getDaysRented() > 2)
                        $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                    break;
                case Movie::PRICE_CODE_NEW_RELEASE:
                    $thisAmount += $each->getDaysRented() * 3;
                    break;
                case Movie::PRICE_CODE_CHILDREN:
                    $thisAmount += 1.5;
                    if ($each->getDaysRented() > 3)
                        $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                    break;
            }

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if ($each->getMovie()->getPriceCode() == Movie::PRICE_CODE_NEW_RELEASE
                && $each->getDaysRented() > 1)
                $frequentRenterPoints++;

            // add footer lines
            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . $thisAmount . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= 'You owed ' . $totalAmount . "\n";
        $result .= 'You earned ' . $frequentRenterPoints . " frequent renter points\n";


        return $result;
    }
}