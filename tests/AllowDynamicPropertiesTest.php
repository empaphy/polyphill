<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use AllowDynamicProperties;
use PHPUnit\Framework\TestCase;

class AllowDynamicPropertiesTest extends TestCase
{
    /**
     * @noinspection PhpConditionAlreadyCheckedInspection
     */
    public function testAllowDynamicProperties()
    {
        $allowDynamicProperties = new AllowDynamicProperties();
        $this->assertInstanceOf('AllowDynamicProperties', $allowDynamicProperties);
    }
}
