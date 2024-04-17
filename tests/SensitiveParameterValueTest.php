<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use SensitiveParameterValue;

class SensitiveParameterValueTest extends TestCase
{
    public function testSensitiveParameterValue()
    {
        $value = 'sensitive value';
        $sensitiveParameterValue = new SensitiveParameterValue($value);
        $this->assertEquals($value, $sensitiveParameterValue->getValue());
        $this->assertEquals(array(), $sensitiveParameterValue->__debugInfo());

        $this->expectException('Exception');
        /** @noinspection PhpParamsInspection */
        $this->expectExceptionMessage("Serialization of 'SensitiveParameterValue' is not allowed");
        serialize($sensitiveParameterValue);

        $this->expectException('Exception');
        /** @noinspection PhpParamsInspection */
        $this->expectExceptionMessage("Unserialization of 'SensitiveParameterValue' is not allowed");
        $sensitiveParameterValue->__wakeUp();
    }
}
