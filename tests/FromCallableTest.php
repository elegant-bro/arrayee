<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\FromCallable;
use Exception;
use PHPUnit\Framework\TestCase;

final class FromCallableTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'bar'],
            (new FromCallable(
                static function () { return ['foo' => 'bar']; }
            ))->asArray()
        );
    }
}