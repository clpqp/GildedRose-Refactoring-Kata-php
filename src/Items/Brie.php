<?php
namespace App\Items;

use App\Item;

final class Brie extends AbstractItem
{
    public function __construct(Item $item)
    {
        parent::__construct($item);
    }

    protected function updateQuality(): void
    {
        if ($this->item->sell_in > 0) {
            $this->item->quality += 1;
        } else {
            $this->item->quality += 2;
        }
    }
}
