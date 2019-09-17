<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Mapped;
use Exception;
use PHPUnit\Framework\TestCase;

final class MappedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            [3, 7, 5],
            (new Mapped(
                new Just(['foo', 'bar-baz', '12345']),
                'strlen'
            ))->asArray()
        );
    }
}