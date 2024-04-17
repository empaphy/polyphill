<?php

namespace Zend;

use PHPUnit\Framework\TestCase;
use Empaphy\Polyphill\Zend\Builtin;

class BuiltinTest extends TestCase
{
    /**
     * Test {@see Builtin::each()}.
     *
     * @return void
     */
    public function testEach()
    {
        $array = array(
            'foo' => 'bar',
            'baz' => 'qux',
        );

        foreach (array_keys($array) as $key) {
            $this->assertEquals(
                array(
                    1       => $array[$key],
                    'value' => $array[$key],
                    0       => $key,
                    'key'   => $key,
                ),
                Builtin::each($array)
            );
        }

        $this->assertFalse(Builtin::each($array));
    }
}
