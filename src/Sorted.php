<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function uasort;

final class Sorted implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var callable
     */
    private $compare;


    public function __construct(Arrayee $arrayee, callable $compare)
    {
        $this->arrayee = $arrayee;
        $this->compare = $compare;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        $arr = $this->arrayee->asArray();
        uasort($arr, $this->compare);

        return $arr;
    }
}
