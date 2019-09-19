<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\ValuesOf;
use Exception;
use PHPUnit\Framework\TestCase;

final class ValuesOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['bar', 'kek'],
            (new ValuesOf(
                new Just(['foo' => 'bar', 'lol' => 'kek'])
            ))->asArray()
        );
    }
}