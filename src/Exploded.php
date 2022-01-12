<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Stringify;
use Exception;

class Exploded implements Arrayee
{
    /**
     * @var Stringify separator
     */
    private $separator;

    /**
     * @var Stringify stringify to explode
     */
    private $stringify;

    public function __construct(Stringify $separator, Stringify $stringify)
    {
        $this->separator = $separator;
        $this->stringify = $stringify;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return explode($this->separator->asString(), $this->stringify->asString());
    }
}
