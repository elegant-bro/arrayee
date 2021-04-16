<?php

declare(strict_types=1);

namespace ElegantBro\Arrayee;

use ElegantBro\Interfaces\Arrayee;
use Exception;
use function call_user_func;

/**
 * @template T
 */
final class MappedWithKeys implements Arrayee
{
    /**
     * @var Arrayee
     */
    private $arrayee;

    /**
     * @var callable
     */
    private $valFunc;

    /**
     * @var callable
     */
    private $keyFunc;

    public static function preserveKeys(Arrayee $arrayee, callable $valFunc): self
    {
        return new self(
            $arrayee,
            static function ($key) {
                return $key;
            },
            $valFunc
        );
    }

    public static function preserveValues(Arrayee $arrayee, callable $keyFunc): self
    {
        return new self(
            $arrayee,
            $keyFunc,
            static function ($key, $val) {
                return $val;
            },
        );
    }

    public function __construct(Arrayee $arrayee, callable $keyFunc, callable $valFunc)
    {
        $this->arrayee = $arrayee;
        $this->keyFunc = $keyFunc;
        $this->valFunc = $valFunc;
    }

    /**
     * @return array<T>
     * @throws Exception
     */
    public function asArray(): array
    {
        $res = [];
        foreach ($this->arrayee->asArray() as $key => $val) {
            $res[
                call_user_func($this->keyFunc, $key, $val)
            ] = call_user_func($this->valFunc, $key, $val);
        }

        return $res;
    }
}
