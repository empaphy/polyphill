<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

namespace Tests;

use Override;
use PHPUnit\Framework\TestCase;

class OverrideTest extends TestCase
{
    /**
     * @noinspection PhpConditionAlreadyCheckedInspection
     */
    public function testOverride()
    {
        $override = new Override();
        $this->assertInstanceOf('Override', $override);
    }
}
