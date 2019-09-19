<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function uksort;

final class SortedByKeys implements Arrayee
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
        uksort(
            $arr = $this->arrayee->asArray(),
            $this->compare
        );

        return $arr;
    }
}
