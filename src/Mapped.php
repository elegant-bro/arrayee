<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function array_map;

final class Mapped implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var callable
     */
    private $mapFunc;

    /**
     * Mapped constructor.
     */
    public function __construct(Arrayee $arrayee, callable $mapFunc)
    {
        $this->arrayee = $arrayee;
        $this->mapFunc = $mapFunc;
    }


    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_map($this->mapFunc, $this->arrayee->asArray());
    }
}
