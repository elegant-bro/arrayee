<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee\Tests\Stub;


use ElegantBro\Interfaces\Stringify;
use Exception;

final class StubStringify implements Stringify
{
    /**
     * @var string
     */
    private $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->str;
    }
}