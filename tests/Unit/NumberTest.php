<?php

namespace Tests\Unit;

use App\Helpers\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testConvert()
    {
        // English to english
        $number = '1234567890123456';
        $converted = Number::convert($number);
        $this->assertEquals('1234567890123456', $converted);

        // Persian to english
        $number = '۱۲۳۴۵۶۷۸۹۰۱۲۳۴۵۶';
        $converted = Number::convert($number);
        $this->assertEquals('1234567890123456', $converted);

        // Arabic to english
        $number = '١٢٣٤٥٦٧٨٩٠١٢٣٤٥٦';
        $converted = Number::convert($number);
        $this->assertEquals('1234567890123456', $converted);
    }
}
