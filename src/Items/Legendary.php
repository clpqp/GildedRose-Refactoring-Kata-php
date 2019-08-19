<?php
namespace App\Items;

use App\Item;

final class Legendary extends AbstractItem
{
    public function __construct(Item $item)
    {
        parent::__construct($item);
    }

    /**
     * Перегружаем функцию, т.к. нам не нужна проверка на quality > 50 и неотрицательный sell_in
     */
    public function update(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    /**
     * Перегружаем функцию и ничего не делаем, потому что легендарный и не портится.
     */
    protected function updateSellIn(): void
    {
    }

    /**
     * Просто присваиваем 80, чтоб не поменялось.
     */
    protected function updateQuality(): void
    {
        $this->item->quality = 80;
    }
}
