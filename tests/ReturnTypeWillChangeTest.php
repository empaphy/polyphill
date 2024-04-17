<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use ReturnTypeWillChange;

class ReturnTypeWillChangeTest extends TestCase
{
    /**
     * @noinspection PhpConditionAlreadyCheckedInspection
     */
    public function testOverride()
    {
        $override = new ReturnTypeWillChange();
        $this->assertInstanceOf('ReturnTypeWillChange', $override);
    }
}
