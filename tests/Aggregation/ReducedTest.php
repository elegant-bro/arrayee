<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests\Aggregation;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Aggregation\Reduced;
use PHPUnit\Framework\TestCase;

class ReducedTest extends TestCase
{
    public function testAsArrayWithoutInitial(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'bar'=> 'foo'],
            Reduced::initialEmpty(
                new Just(
                    [
                        ['foo' => 'bar'],
                        ['bar' => 'foo']
                    ]
                ),
                function (array $carry, array $item) {
                    return array_merge($carry, $item);
                }
            )->asArray()
        );
    }
    public function testAsArrayWithInitial(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'bar'=> 'foo', 'fuz' => 'foo'],
            (
            new Reduced(
                new Just(
                    [
                        ['foo' => 'bar'],
                        ['bar' => 'foo']
                    ]
                ),
                function (array $carry, array $item) {
                    return array_merge($carry, $item);
                },
                new Just(['fuz' => 'foo'])
            )
            )->asArray()
        );
    }
    public function testAsArrayUsageForCalculatingScore(): void
    {
        $this->assertEquals(
            [
                'user1' => 100,
                'user2' => 200
            ],
            Reduced::initialEmpty(
                new Just(
                    [
                        ['name' => 'user1', 'score' => 70],
                        ['name' => 'user1', 'score' => 30],
                        ['name' => 'user2', 'score' => 100],
                        ['name' => 'user2', 'score' => 50],
                        ['name' => 'user2', 'score' => 50]
                    ]
                ),
                function (array $carry, array $item) {
                    $carry[$item['name']] = isset($carry[$item['name']])
                        ? $carry[$item['name']] + $item['score']
                        : $item['score'];
                    return $carry;
                }
            )->asArray()
        );
    }
    public function testAsArrayFunctionReturnNotArray(): void
    {
        $this->expectException(\RuntimeException::class);
        Reduced::initialEmpty(
            new Just(
                [
                    ['foo' => 'bar']
                ]
            ),
            function (array $carry, array $item) {
                return null;
            }
        )->asArray();
    }
}
