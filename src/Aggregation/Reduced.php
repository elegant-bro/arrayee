<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee\Aggregation;

use ElegantBro\Arrayee\Just;
use ElegantBro\Interfaces\Arrayee;
use Exception;
use function array_reduce;

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
     * @var Arrayee
     */
    private $initial;

    /**
     * Reduced constructor.
     * @param Arrayee $arrayee
     * @param callable $callback Function that reduces items to array <code>function(array $carry, $item): array</code>
     * @param Arrayee $initial
     */
    public function __construct(Arrayee $arrayee, callable $callback, Arrayee $initial)
    {
        $this->arrayee = $arrayee;
        $this->callback = $callback;
        $this->initial = $initial;
    }

    /**
     * @param Arrayee $arrayee
     * @param callable $callback Function that reduces items to array <code>function(array $carry, $item): array</code>
     * @return Reduced
     */
    public static function initialEmpty(Arrayee $arrayee, callable $callback): Reduced
    {
        return new Reduced(
            $arrayee,
            $callback,
            new Just([])
        );
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
            throw new \RuntimeException("Reduced is not array");
        }
        return $reduced;
    }
}
