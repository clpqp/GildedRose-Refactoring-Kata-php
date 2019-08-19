<?php
namespace App\Items;

use App\Item;

final class Passes extends AbstractItem
{
    public function __construct(Item $item)
    {
        parent::__construct($item);
    }

    protected function updateQuality(): void
    {
        if ($this->item->sell_in > 10) {
            $this->item->quality += 1;
        } elseif ($this->canQualityIncreasedBy2()) {
            $this->item->quality += 2;
        } elseif ($this->canQualityIncreasedBy3()) {
            $this->item->quality += 3;
        } else {
            $this->item->quality = 0;
        }
    }

    private function canQualityIncreasedBy2(): bool
    {
        if($this->item->sell_in <= 10 and $this->item->sell_in > 5) {
            return true;
        }
        return false;
    }

    private function canQualityIncreasedBy3(): bool
    {
        if($this->item->sell_in <= 5 and $this->item->sell_in > 0) {
            return true;
        }
        return false;
    }
}
