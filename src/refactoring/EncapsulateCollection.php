<?php


namespace victor\refactoring;

$hotelCharges = new HotelCharges();
$dayCharge = new HotelDayCharge(100, true, 5);
$hotelCharges->days[] = $dayCharge;
$dayCharge->setHotel($hotelCharges);
echo 'FEE: ' . $hotelCharges->totalFee . "\n";
$hotelCharges->computeTotal();
echo 'FEE: ' . $hotelCharges->totalFee . "\n";


class HotelCharges
{
    const BREAKFAST_FEE = 10;
    const PARKING_HOUR_RATE = 2;
    public $days = [];
    public $totalFee;

    public function computeTotal()
    {
        $this->totalFee = 0;
        /** @var HotelDayCharge $day */
        foreach ($this->days as $day) {
            $this->totalFee += $day->getDayRate();
            if ($day->isBreakfast()) {
                $this->totalFee += self::BREAKFAST_FEE;
            }
            $this->totalFee += $day->getParkingHours() * self::PARKING_HOUR_RATE;
        }
    }
}

class HotelDayCharge
{
    private $dayRate;
    private $breakfast;
    private $parkingHours;
    private $hotel;

    public function __construct(int $dayRate, bool $breakfastFee, int $parkingHours)
    {
        $this->dayRate = $dayRate;
        $this->breakfast = $breakfastFee;
        $this->parkingHours = $parkingHours;
    }

    public function setHotel(HotelCharges $hotel): void
    {
        $this->hotel = $hotel;
    }

    public function getDayRate(): int
    {
        return $this->dayRate;
    }

    public function getParkingHours(): int
    {
        return $this->parkingHours;
    }

    public function isBreakfast(): bool
    {
        return $this->breakfast;
    }

}