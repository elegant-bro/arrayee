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
    private $strategy;

    /**
     * DiffOf constructor.
     *
     * @param Arrayee $arrayee
     * @param DiffWay $strategy
     */
    public function __construct(Arrayee $arrayee, DiffWay $strategy)
    {
        $this->arrayee = $arrayee;
        $this->strategy = $strategy;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->strategy->diff($this->arrayee);
    }
}
