<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;


use ArrayIterator;
use ElegantBro\Arrayee\FromIterable;
use Exception;
use PHPUnit\Framework\TestCase;

final class FromIterableTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'bar' => 'baz'],
            (new FromIterable(
                ['foo' => 'bar', 'bar' => 'baz']
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsArrayLimited(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'bar' => 'baz'],
            (new FromIterable(
                new ArrayIterator(['foo' => 'bar', 'bar' => 'baz', 'lol' => 'kek']),
                2
            ))->asArray()
        );
    }
}