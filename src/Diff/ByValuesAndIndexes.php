<?php

declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Diff;

use ElegantBro\Arrayee\Just;
use ElegantBro\Arrayee\Mapped;
use ElegantBro\Interfaces\Arrayee;
use function array_diff_assoc;

final class ByValuesAndIndexes implements DiffWay
{
    /**
     * @var Arrayee
     */
    private $arrayees;

    /**
     * ByValues constructor.
     *
     * @param Arrayee ...$arrayees
     */
    public function __construct(Arrayee ...$arrayees)
    {
        $this->arrayees = new Just($arrayees);
    }

    /**
     * @inheritDoc
     */
    public function diff(Arrayee $arrayee): array
    {
        return array_diff_assoc($arrayee->asArray(), ...(new Mapped(
            $this->arrayees,
            static function (Arrayee $arrayee) {
                return $arrayee->asArray();
            }
        ))->asArray());
    }
}
