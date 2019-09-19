<?php declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\SliceOf;
use Exception;
use PHPUnit\Framework\TestCase;

final class SliceOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'bar'],
            (new SliceOf(
                new Just(
                    [
                        'bar' => 'baz',
                        'foo' => 'bar'
                    ]
                ),
                1
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsArrayWithLimit(): void
    {
        $this->assertEquals(
            ['foo' => 'bar'],
            (new SliceOf(
                new Just(
                    [
                        'bar' => 'baz',
                        'foo' => 'bar'
                    ]
                ),
                1,
                1
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsArrayWithNegativeLimit(): void
    {
        $this->assertEquals(
            ['bar' => 'baz'],
            (new SliceOf(
                new Just(
                    [
                        'bar' => 'baz',
                        'foo' => 'bar',
                        'lol' => 'kek'
                    ]
                ),
                0,
                -2
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsArrayWithNegativeOffset(): void
    {
        $this->assertEquals(
            ['lol' => 'kek'],
            (new SliceOf(
                new Just(
                    [
                        'bar' => 'baz',
                        'foo' => 'bar',
                        'lol' => 'kek'
                    ]
                ),
                -1,
                1
            ))->asArray()
        );
    }
    /**
     * @throws Exception
     */
    public function testAsArrayWithOvervalued(): void
    {
        $this->assertEquals(
            [],
            (new SliceOf(
                new Just(
                    [
                        'bar' => 'baz',
                        'foo' => 'bar',
                        'lol' => 'kek'
                    ]
                ),
                300,
                200
            ))->asArray()
        );
    }
}