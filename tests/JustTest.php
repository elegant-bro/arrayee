<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use Exception;
use PHPUnit\Framework\TestCase;

final class JustTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'bar'],
            (new Just(['foo' => 'bar']))->asArray()
        );
    }
}