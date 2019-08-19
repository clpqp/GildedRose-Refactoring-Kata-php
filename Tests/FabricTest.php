<?php

namespace App\Tests;

use App\Helpers\Fabric;
use App\Item;
use App\Items\Brie;
use App\Items\Conjured;
use App\Items\Passes;
use \App\Items\Standard;
use \App\Items\Legendary;
use PHPUnit\Framework\TestCase;

class FabricTest extends TestCase {
    public function testExpectStandardItem()
    {
        $actual = new Item("foo", 0, 0);
        $expect = Standard::class;
        $fabric = Fabric::create($actual)->get();
        $actual = get_class($fabric);

        $this->assertEquals($expect, $actual);
    }

    public function testExpectLegendaryItem()
    {
        $actual = new Item('Sulfuras, Hand of Ragnaros', 80, 100);
        $expect = Legendary::class;
        $fabric = Fabric::create($actual)->get();
        $actual = get_class($fabric);

        $this->assertEquals($expect, $actual);
    }

    public function testExpectBrieItem()
    {
        $actual = new Item('Aged Brie', 80, 100);
        $expect = Brie::class;
        $fabric = Fabric::create($actual)->get();
        $actual = get_class($fabric);

        $this->assertEquals($expect, $actual);
    }

    public function testExpectPassesItem()
    {
        $actual = new Item('Backstage passes to a TAFKAL80ETC concert', 80, 100);
        $expect = Passes::class;
        $fabric = Fabric::create($actual)->get();
        $actual = get_class($fabric);

        $this->assertEquals($expect, $actual);
    }

    public function testExpectConjuredItem()
    {
        $actual = new Item('Conjured cake of mana', 80, 100);
        $expect = Conjured::class;
        $fabric = Fabric::create($actual)->get();
        $actual = get_class($fabric);

        $this->assertEquals($expect, $actual);
    }
}
