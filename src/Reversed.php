<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function array_reverse;

final class Reversed implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    public function __construct(Arrayee $arrayee)
    {
        $this->arrayee = $arrayee;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return array_reverse($this->arrayee->asArray(), true);
    }
}
