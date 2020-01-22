<?php declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Tests;

use ElegantBro\Arrayee\Diff\ByValues;
use ElegantBro\Arrayee\DiffOf;
use ElegantBro\Arrayee\Just;
use PHPUnit\Framework\TestCase;
use Exception;

class DiffOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            [1 => 'blue', 0 => 'red', 'b' => 'red'],
            (new DiffOf(
                new Just(['a' => 'green', 'red', 'blue', 'b' => 'red']),
                new ByValues(
                    new Just(['b' => 'green', 'yellow',  'red' => 'b']),
                    new Just(['d' => 'green'])
                )
            ))->asArray()
        );

    }
}
