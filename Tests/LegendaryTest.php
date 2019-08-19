<?php

namespace App\Tests;

use App\Item;
use App\Items\Legendary;
use PHPUnit\Framework\TestCase;

class LegendaryTest extends TestCase {
    public function testUpdate()
    {
        $actual = new Item("Sulfuras", 5, 10);
        $expect = new Item("Sulfuras", 5, 80);
        $legendary = new Legendary($actual);
        $legendary->update();

        $this->assertEquals($actual, $expect);
    }

}
