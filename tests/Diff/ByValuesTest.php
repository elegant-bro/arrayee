<?php declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Tests\Diff;

use ElegantBro\Arrayee\Diff\ByValues;
use ElegantBro\Arrayee\Just;
use PHPUnit\Framework\TestCase;

class ByValuesTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testDiff(): void
    {
        $this->assertEquals(
            [1 => 'blue', 0 => 'red', 'b' => 'red'],
            (new ByValues(
                    new Just(['b' => 'green', 'yellow',  'red' => 'b']),
                    new Just(['d' => 'green'])
            ))->diff(new Just(['a' => 'green', 'red', 'blue', 'b' => 'red']))
        );
    }

}
