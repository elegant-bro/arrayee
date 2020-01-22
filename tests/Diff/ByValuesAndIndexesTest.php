<?php declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Tests\Diff;

use ElegantBro\Arrayee\Diff\ByValuesAndIndexes;
use ElegantBro\Arrayee\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class ByValuesAndIndexesTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testDiff(): void
    {
        $this->assertEquals(
            ['b' => 'brown', 'c' => 'blue'],
            (new ByValuesAndIndexes(
                new Just(['a' => 'green', 'yellow', 'red']),
                new Just(['red','d' => 'green'])
            ))->diff(new Just(['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red']))
        );
    }
}
