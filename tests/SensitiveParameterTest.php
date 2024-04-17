<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use SensitiveParameter;

class SensitiveParameterTest extends TestCase
{
    /**
     * @noinspection PhpConditionAlreadyCheckedInspection
     */
    public function testOverride()
    {
        $override = new SensitiveParameter();
        $this->assertInstanceOf('SensitiveParameter', $override);
    }
}
