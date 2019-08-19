<?php

namespace App;

use App\Helpers\Fabric;

final class GildedRose {

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            $product = Fabric::create($item)->get();
            $product->update();
        }
    }
}

