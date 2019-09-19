<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Reversed;
use Exception;
use PHPUnit\Framework\TestCase;

final class ReversedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            ['lol' => 'kek', 'foo' => 'bar'],
            (new Reversed(
                new Just(
                    ['foo' => 'bar', 'lol' => 'kek']
                )
            ))->asArray()
        );
    }
}