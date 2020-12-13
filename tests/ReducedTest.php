<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Reduced;
use PHPUnit\Framework\TestCase;

class ReducedTest extends TestCase
{
    public function testAsArrayWithoutInitial(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'bar'=> 'foo'],
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
                    }
                )
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
            (
                new Reduced(
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
                )
            )->asArray()
        );
    }
}
