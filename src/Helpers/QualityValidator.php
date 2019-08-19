<?php
/**
 * Created by PhpStorm.
 * User: clpq
 * Date: 16.08.19
 * Time: 11:37
 */

namespace App\Helpers;


use Prophecy\Exception\InvalidArgumentException;

class QualityValidator
{
    /**
     * Проверка на непревышение параметром "качество" 50 (не используется в Legendary)
     * @param int $quality
     * @return bool
     */
    public static function isQualityMoreThan50(int $quality): bool
    {
        return $quality > 50 ? true : false;
    }

    /**
     * Проверка на неотрицательное качетсво товара.
     * @param int $quality
     * @return bool|InvalidArgumentException
     */
    public static function isANegativeNumber(int $quality): ?bool
    {
        if($quality < 0) {
            throw new InvalidArgumentException('Quality can not be negative number');
        }
        return true;
    }
}