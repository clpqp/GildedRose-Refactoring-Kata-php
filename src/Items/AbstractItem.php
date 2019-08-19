<?php
namespace App\Items;

use App\Helpers\QualityValidator;
use App\Item;
use Prophecy\Exception\InvalidArgumentException;

/**
 * Абстрактный класс для элементов
 */
abstract class AbstractItem
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Функция для обновления sell_in, quality
     * Так же проверяем на то, чтоб качество было неотрицательным, и было не больше 50
     * @return void
     * @throws InvalidArgumentException
     */
    public function update(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
        try {
            QualityValidator::isANegativeNumber($this->item->quality);
        } catch (\InvalidArgumentException $exception) {
            $this->item->sell_in = 0;
        }
        if (QualityValidator::isQualityMoreThan50($this->item->quality)) {
            $this->item->quality = 50;
        }
    }

    /**
     * Обновление качества, изменяется у разных наследников класса.
     * @return void
     */
    abstract protected function updateQuality(): void;

    /**
     * Уменьшение свойства "срок хранения"
     */
     protected function updateSellIn(): void
     {
         $this->item->sell_in -= 1;
     }
}
