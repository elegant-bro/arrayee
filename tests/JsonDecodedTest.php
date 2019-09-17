<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests;


use ElegantBro\Arrayee\JsonDecoded;
use ElegantBro\Arrayee\Tests\Stub\StubStringify;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class JsonDecodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ['foo' => 'bar', 'baz' => 1],
            (new JsonDecoded(
                new StubStringify('{"foo":"bar","baz":1}')
            ))->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsArrayFailInvalidJson(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Syntax error');
        (new JsonDecoded(
            new StubStringify('not json')
        ))->asArray();
    }

    /**
     * @throws Exception
     */
    public function testAsArrayFailNotArray(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Json is not an array');
        (new JsonDecoded(
            new StubStringify('"foo"')
        ))->asArray();
    }
}