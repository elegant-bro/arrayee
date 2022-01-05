<?php

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Exploded;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class ExplodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo','bar'],
            (new Exploded(
                new Just('-'),
                new Just('foo-bar')
            ))->asArray()
        );

        $this->assertEquals(['foo','bar'], Exploded::byComma(new Just('foo,bar'))->asArray());
    }
}
