<?php

declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee;

use ElegantBro\Arrayee\Diff\DiffWay;
use ElegantBro\Interfaces\Arrayee;

final class DiffOf implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var DiffWay
     */
    private $way;

    /**
     * DiffOf constructor.
     *
     * @param Arrayee $arrayee
     * @param DiffWay $way
     */
    public function __construct(Arrayee $arrayee, DiffWay $way)
    {
        $this->arrayee = $arrayee;
        $this->way = $way;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->way->diff($this->arrayee);
    }
}
