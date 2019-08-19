Требования для установки
------------

  -PHP 7;
  -Composer;

Запуск
---------------
Скачать проект, распокавать архив, выполнить 

```
cd GildedRose-Refactoring-Kata-php-master
composer install
vendor/bin/phpunit
php fixtures/texttest_fixture.php N где N - количество дней для вывода отчёта
```

Заметки
----
**Что сделано**
  - Создан общий абстрактный класс AbstractItem;
  - Созданы потомки класса AbstractItem -- Brie, Conjured, Legendary, Passes, Standart, в которых реализован метод updateQuality (для Ltgendary перегружен метод updateSellIn);
  - Создана фабрика - App\Helpers\Fabric, создающая экземпляр класса, в зависимости от свойства item->name;
  - Создан хелпер App\Helpers\QualityValidator для валидации значения quality (просто для удобства тестирования);
  - Написаны тесты;
  - Переписан класс App\GildedRose;
  
**Что вызвало затруднение**
  - Не совсем понял формулировку `Качество «Backstage passes» также, как и «Aged Brie», увеличивается по мере приближения к сроку хранения.` - Aged Brie имеет те же свойства, что и Backstage passes или это было указание на их схожесть по типу `Для товара «Aged Brie» качество увеличивается пропорционально возрасту;` реализовал второй вариант; 
  - Большое кол-во условий в некоторых классах продуктор - не придумал адекватного способа от них избавиться.
  
