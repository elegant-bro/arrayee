<?php

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Exploded;
use ElegantBro\Arrayee\Tests\Stub\StubStringify;
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
                new StubStringify("-"),
                new StubStringify('foo-bar')
            ))->asArray()
        );
    }
}
