<?php

namespace App\Tests;

use App\Item;
use \App\Items\Brie;
use PHPUnit\Framework\TestCase;

class BrieTest extends TestCase {
    public function testJustUpdateItem()
    {
        $actual = new Item("brie", 5, 10);
        $brie = new Brie($actual);
        $brie->update();
        $expect = new Item("brie", 4, 11);

        $this->assertEquals($actual, $expect);
    }

    public function testUpdateWhenSellInIsZero()
    {
        $actual = new Item("brie", 0, 10);
        $brie = new Brie($actual);
        $brie->update();
        $expect = new Item("brie", -1, 12);

        $this->assertEquals($actual, $expect);
    }
}
