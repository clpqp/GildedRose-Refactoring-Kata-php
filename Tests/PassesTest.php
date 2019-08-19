<?php

namespace App\Tests;

use App\Item;
use \App\Items\Passes;
use PHPUnit\Framework\TestCase;

class PassesTest extends TestCase {
    public function testUpdateWhenSellInMoreThan10()
    {
        $actual = new Item('Passes', 15, 19);
        $expected = new Item('Passes', 14, 20);
        $passes = new Passes($actual);
        $passes->update();

        $this->assertEquals($expected,$actual);
    }

    public function testUpdateWhenSellInMoreThan5()
    {
        $actual = new Item('Passes', 7, 19);
        $expected = new Item('Passes', 6, 21);
        $passes = new Passes($actual);
        $passes->update();

        $this->assertEquals($expected,$actual);
    }

    public function testUpdateWhenSellInLessThan5()
    {
        $actual = new Item('Passes', 4, 19);
        $expected = new Item('Passes', 3, 22);
        $passes = new Passes($actual);
        $passes->update();

        $this->assertEquals($expected,$actual);
    }

    public function testUpdateWhenSellInIsZero()
    {
        $actual = new Item('Passes', 1, 19);
        $expected = new Item('Passes', 0, 0);
        $passes = new Passes($actual);
        $passes->update();

        $this->assertEquals($expected,$actual);
    }
}
