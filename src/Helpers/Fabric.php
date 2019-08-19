<?php

namespace App\Helpers;

use \App\Item;
use \App\Items\AbstractItem;
use \App\Items\Standard;
use \App\Items\Brie;
use \App\Items\Legendary;
use \App\Items\Passes;
use \App\Items\Conjured;

/**
 * Class Fabric
 * Фабрика для создания объектов исходя из свойства $item->name
 * @package App\Helpers
 */
class Fabric
{
    private $items = [
      'Aged Brie' => Brie::class,
      'Sulfuras' => Legendary::class,
      'Backstage passes' => Passes::class,
      'Conjured' => Conjured::class,
    ];
    private $item;
    private $standardItem = Standard::class;

    private function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
    *  Функция создания элемента
     * @param Item $item
     * @return self
    **/
    public static function create(Item $item)
    {
        return new self($item);
    }

    /**
    * Функция для поиска класса по строке
    * @param string $itemName
    * @return string $item
    **/
    private function arraySearch(string $itemName)
    {
        foreach($this->items as $key => $value) {
            if(stripos($itemName, $key) !== false) {
                return $value;
            }
        }
        return $this->standardItem;
    }

    /**
    * Возвращает класс элемента
    * @return AbstractItem $class
    **/
    public function get(): AbstractItem
    {
        $class = $this->arraySearch($this->item->name);
        return new $class($this->item);
    }
}
