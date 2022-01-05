<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use ElegantBro\Interfaces\Stringify;
use Exception;

class Exploded implements Arrayee
{
    /**
     * @var Stringify glue
     */
    private $glue;

    /**
     * @var Stringify stringify to explode
     */
    private $stringify;

    public static function byComma(Stringify $stringify): Exploded
    {
        return new static(new \ElegantBro\Stringify\Just(","), $stringify);
    }

    public function __construct(Stringify $glue, Stringify $stringify)
    {
        $this->glue = $glue;
        $this->stringify = $stringify;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return explode($this->glue->asString(), $this->stringify->asString());
    }
}
