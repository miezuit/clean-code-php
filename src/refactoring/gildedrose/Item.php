<?php
/**
 * Created by PhpStorm.
 * User: VictorRentea
 * Date: 16-Apr-19
 * Time: 03:35 PM
 */

namespace victor\refactoring\gildedrose;


class Item
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct(string $name, float $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }


}