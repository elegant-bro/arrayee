<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\MappedWithKeys;
use Exception;
use PHPUnit\Framework\TestCase;
use function strtoupper;

final class MappedWithKeysTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        self::assertEquals(
            [
                2 => 'FOO',
                6 => 'BAR',
                10 => 'BAZ',
            ],
            (new MappedWithKeys(
                new Just([
                    1 => 'foo',
                    3 => 'bar',
                    5 => 'baz',
                ]),
                static function(int $key): int {
                    return $key * 2;
                },
                static function(int $key, string $val): string {
                    return strtoupper($val);
                },
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testPreserveKeys(): void
    {
        self::assertEquals(
            [
                1 => 'FOO',
                3 => 'BAR',
                5 => 'BAZ',
            ],
            MappedWithKeys::preserveKeys(
                new Just([
                    1 => 'foo',
                    3 => 'bar',
                    5 => 'baz',
                ]),
                static function(int $key, string $val): string {
                    return strtoupper($val);
                },
            )->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testPreserveValues(): void
    {
        self::assertEquals(
            [
                2 => 'foo',
                6 => 'bar',
                10 => 'baz',
            ],
            MappedWithKeys::preserveValues(
                new Just([
                    1 => 'foo',
                    3 => 'bar',
                    5 => 'baz',
                ]),
                static function(int $key): int {
                    return $key * 2;
                },
            )->asArray()
        );
    }
}
