<?php

declare(strict_types=1);


namespace ElegantBro\Arrayee;


use ElegantBro\Interfaces\Arrayee;
use Exception;
use function array_merge;

final class Merged implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayees;

    public function __construct(Arrayee ...$arrayees)
    {
        $this->arrayees = new Just($arrayees);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_merge(
            ...(new Mapped(
                $this->arrayees,
                static function (Arrayee $arrayee) { return $arrayee->asArray(); }
            ))->asArray()
        );
    }
}