<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Merged;
use Exception;
use PHPUnit\Framework\TestCase;

final class MergedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'baz', 'bar' => 1, 'baz' => 2],
            (new Merged(
                new Just(['foo' => 1, 'bar' => 1]),
                new Just(['foo' => 'baz', 'baz' => 2])
            ))->asArray()
        );
    }
}