<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Merged;
use ElegantBro\Arrayee\MergedRecursive;
use Exception;
use PHPUnit\Framework\TestCase;

final class MergedRecursiveTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        self::assertEquals(
            [
                'foo' => [
                    1,
                    'bar',
                    'baz' => [
                        1,
                    ],
                ],
            ],
            (new MergedRecursive(
                new Just(['foo' => 1]),
                new Just(['foo' => 'bar']),
                new Just(
                    [
                        'foo' => [
                            'baz' => [
                                1,
                            ],
                        ],
                    ],
                ),
            ))->asArray()
        );
    }
}
