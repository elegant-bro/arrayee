<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

use function array_merge_recursive;

/**
 * @template T
 */
final class MergedRecursive implements Arrayee
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
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        return
            array_merge_recursive(
                ...(new Mapped(
                    $this->arrayees,
                    static function (Arrayee $arrayee): array {
                        return $arrayee->asArray();
                    }
                ))->asArray()
            );
    }
}
