<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\SortedByKeys;
use Exception;
use PHPUnit\Framework\TestCase;

final class SortedByKeyTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsStringNatSort(): void
    {
        $this->assertEquals(
            [
                'img1.png' => 3,
                'img2.png' => 2,
                'img10.png' => 1,
                'img12.png' => 0,
            ],
            (new SortedByKeys(
                new Just(['img12.png' => 0, 'img10.png' => 1, 'img2.png' => 2, 'img1.png' => 3]),
                'strnatcmp'
            ))->asArray()
        );
    }

}