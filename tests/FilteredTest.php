<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Filtered;
use ElegantBro\Arrayee\Just;
use Exception;
use PHPUnit\Framework\TestCase;

final class FilteredTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            [1 => 1, 3 => 4, 5 => 9],
            (new Filtered(
                new Just([0, 1, -40, 4, -4, 9, 0]),
                static function (int $number) { return $number > 0; }
            ))->asArray()
        );
    }
}