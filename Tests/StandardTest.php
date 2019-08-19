<?php

namespace App\Tests;

use App\Item;
use \App\Items\Standard;
use PHPUnit\Framework\TestCase;
use Prophecy\Exception\InvalidArgumentException;

class StandardTest extends TestCase {
    public function testJustUpdate()
    {
        $actual = new Item("foo", 5, 10);
        $standard = new Standard($actual);
        $standard->update();
        $expect = new Item("foo", 4, 9);

        $this->assertEquals($actual, $expect);
    }

    public function testUpdateWhenQualityMoreThan50()
    {
        $actual = new Item("foo", 5, 99);
        $standard = new Standard($actual);
        $standard->update();
        $expect = new Item("foo", 4, 50);

        $this->assertEquals($actual, $expect);
    }

    public function testUpdateWhenSellInIsZero()
    {
        $actual = new Item("foo", 0, 10);
        $standard = new Standard($actual);
        $standard->update();
        $expect = new Item("foo", -1, 8);

        $this->assertEquals($actual, $expect);
    }

    public function testUpdateWhenQualityIsSubZero()
    {
        $actual = new Item("foo", 5, -8);
        $standard = new Standard($actual);
        $standard->update();
        $expect = new Item("foo", 0, -9);
        $this->assertEquals($expect, $actual);
    }
}
