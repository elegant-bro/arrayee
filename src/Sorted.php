<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

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

    /**
     * @var bool
     */
    private $byKeys;


    public function __construct(Arrayee $arrayee, callable $compare, bool $byKeys = false)
    {
        $this->arrayee = $arrayee;
        $this->compare = $compare;
        $this->byKeys = $byKeys;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        if ($this->byKeys) {
            uksort(
                $arr = $this->arrayee->asArray(),
                $this->compare
            );
        } else {
            uasort(
                $arr = $this->arrayee->asArray(),
                $this->compare
            );
        }

        return $arr;
    }
}
