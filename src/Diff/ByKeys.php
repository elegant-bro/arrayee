<?php

declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Diff;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Mapped;
use ElegantBro\Interfaces\Arrayee;
use Exception;

/**
 * @template T
 * @implements DiffWay<T>
 */
final class ByKeys implements DiffWay
{
    /**
     * @var Arrayee
     */
    private $arrayees;

    /**
     * @param Arrayee ...$arrayees
     */
    public function __construct(Arrayee ...$arrayees)
    {
        $this->arrayees = new Just($arrayees);
    }

    /**
     * @param Arrayee $arrayee
     *
     * @throws Exception
     * @return array<T>
     */
    public function diff(Arrayee $arrayee): array
    {
        return array_diff_key($arrayee->asArray(), ...(new Mapped(
            $this->arrayees,
            static function (Arrayee $arrayee) {
                return $arrayee->asArray();
            }
        ))->asArray());
    }
}
