<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee;


use ElegantBro\Interfaces\Arrayee;
use Exception;

final class Just implements Arrayee
{
    /**
     * @var array
     */
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->array;
    }
}