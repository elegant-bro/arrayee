<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function array_merge;

final class Reduced implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;
    /**
     * @var callback
     */
    private $callback;
    /**
     * @var ?Arrayee
     */
    private $initial;

    /**
     * Reduced constructor.
     * @param Arrayee $arrayee
     * @param callable $callback
     * @param Arrayee|null $initial
     */
    public function __construct(Arrayee $arrayee, callable $callback, ?Arrayee $initial = null)
    {
        $this->arrayee = $arrayee;
        $this->callback = $callback;
        $this->initial = $initial ?? new Just([]);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        $reduced = array_reduce(
            $this->arrayee->asArray(),
            $this->callback,
            $this->initial->asArray()
        );
        if (!is_array($reduced)) {
            throw new RuntimeException("Reduced is not array");
        }
        return $reduced;
    }
}
