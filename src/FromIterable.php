<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;

final class FromIterable implements Arrayee
{
    /**
     * @var iterable
     */
    private $iterable;

    /**
     * @var int
     */
    private $limit;

    public function __construct(iterable $iterable, int $limit = 0)
    {
        $this->iterable = $iterable;
        $this->limit = $limit;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        $res = [];
        if (1 > $this->limit) {
            foreach ($this->iterable as $k => $v) {
                $res[$k] = $v;
            }
        } else {
            $i = 0;
            foreach ($this->iterable as $k => $v) {
                $res[$k] = $v;
                if ($this->limit === ++$i) {
                    break;
                }
            }
        }

        return $res;
    }
}
