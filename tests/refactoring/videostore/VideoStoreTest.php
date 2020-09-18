<?php
namespace victor\refactoring\videostore;

use PHPUnit\Framework\TestCase;

class VideoStoreTest extends TestCase {

    public function testRentalStatementFormat(): void
    {
        $customer = new Customer('John');
        $customer->addRental(new Rental(new Movie('Star Wars', Movie::PRICE_CODE_NEW_RELEASE), 6));
        $customer->addRental(new Rental(new Movie('Sofia', Movie::PRICE_CODE_CHILDREN), 7));
        $customer->addRental(new Rental(new Movie('Inception', Movie::PRICE_CODE_REGULAR), 5));


        $this->assertEquals(
            "Rental Record for John\n" .
            "\tStar Wars\t18\n" .
            "\tSofia\t7.5\n" .
            "\tInception\t6.5\n" .
            "You owed 32\n" .
            "You earned 4 frequent renter points\n",
            $customer->statement());
    }
}
