<?php

namespace victor\refactoring\gildedrose;

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    public function testRentalStatementFormat(): void
    {
        $expected = $this->runSimulation(new GildedRose($this->createData()));
        $actual = $this->runSimulation(new GildedRose($this->createData()));
        self::assertEquals($expected, $actual);
    }

    public function runSimulation(GildedRose $gildedRose): string
    {
        $s = '';
        $DAYS = 10;
        for ($i = 0; $i < $DAYS; $i++) {
            $s .= "-------- day " . $i . " --------\n";
            $s .= "name, sellIn, quality\n";
            foreach ($gildedRose->getItems() as $item) {
                $gildedRose->tick();
                $s .= sprintf("%s, %.2f, %d\n", $item->name, $item->quality, $item->sellIn);
            }
        }
        return $s;
    }

    /**
     * @return array
     */
    public function createData(): array
    {
        return [
            new Item("+5 Dexterity Vest", 10, 20),
            new Item("Aged Brie", 2, 0),
            new Item("Elixir of the Mongoose", 5, 7),
            new Item("Sulfuras, Hand of Ragnaros", 0, 80),
            new Item("Sulfuras, Hand of Ragnaros", -1, 80),
            new Item("Backstage passes to a TAFKAL80ETC concert", 15, 20),
            new Item("Backstage passes to a TAFKAL80ETC concert", 10, 49),
            new Item("Backstage passes to a TAFKAL80ETC concert", 5, 49),
            // this conjured item does not work properly yet
            new Item("Conjured Mana Cake", 3, 6)
        ];
    }
}
