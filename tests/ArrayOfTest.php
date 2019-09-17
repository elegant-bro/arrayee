<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\ValuesOf;
use Exception;
use PHPUnit\Framework\TestCase;

final class ArrayOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            ['foo', 'bar'],
            (new ValuesOf(
                new Just(['fee' => 'foo', 'baz' => 'bar'])
            ))->asArray()
        );

        $this->assertEquals(
            [0, 1],
            array_keys(
                (new ValuesOf(
                    new Just(['fee' => 'foo', 'baz' => 'bar'])
                ))->asArray()
            )
        );
    }
}