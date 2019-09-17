<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\KeysOf;
use Exception;
use PHPUnit\Framework\TestCase;

final class KeysOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo', 'bar'],
            (new KeysOf(
                new Just(['foo' => 1, 'bar' => 2])
            ))->asArray()
        );
    }
}