<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

final class FromCallable implements Arrayee
{
    /**
     * @var callable
     */
    private $func;

    public function __construct(callable $func)
    {
        $this->func = $func;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return call_user_func($this->func);
    }
}
