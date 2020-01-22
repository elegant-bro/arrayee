<?php

declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Diff;

use ElegantBro\Interfaces\Arrayee;
use Exception;

interface DiffWay
{
    /**
     * @param Arrayee $arrayee
     *
     * @return array
     * @throws Exception
     */
    public function diff(Arrayee $arrayee): array;
}
