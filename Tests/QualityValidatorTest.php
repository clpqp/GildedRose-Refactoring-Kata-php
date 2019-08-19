<?php

namespace App\Tests;

use App\Helpers\QualityValidator;
use PHPUnit\Framework\TestCase;

class QualityValidatorTest extends TestCase {
    public function testIsQualityMoreThan50()
    {
        $quality = 99;
        $this->assertTrue(QualityValidator::isQualityMoreThan50($quality));
    }

    public function testIsQualityLessThan50()
    {
        $quality = 31;
        $this->assertFalse(QualityValidator::isQualityMoreThan50($quality));
    }

    public function testIsANegativeNumber()
    {
        $quality = -1;
        $this->expectException(\InvalidArgumentException::class);
        QualityValidator::isANegativeNumber($quality);
    }

}
