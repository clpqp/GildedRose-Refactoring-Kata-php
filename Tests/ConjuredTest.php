<?php

namespace App\Tests;

use App\Item;
use \App\Items\Conjured;
use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase
{
    public function testJustUpdateItem()
    {
        $actual = new Item("Conjured cake of mana", 5, 10);
        $brie = new Conjured($actual);
        $brie->update();
        $expect = new Item("Conjured cake of mana", 4, 8);

        $this->assertEquals($actual, $expect);
    }
}
