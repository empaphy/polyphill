<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use Attribute;
use PHPUnit\Framework\TestCase;

class AttributeTest extends TestCase
{
    /**
     * @noinspection PhpConditionAlreadyCheckedInspection
     */
    public function testAttribute()
    {
        $attribute = new Attribute(Attribute::TARGET_CLASS);
        $this->assertInstanceOf('Attribute', $attribute);
        $this->assertEquals(Attribute::TARGET_CLASS, $attribute->flags);
    }
}
