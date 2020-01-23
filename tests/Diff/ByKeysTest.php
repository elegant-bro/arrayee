<?php declare(strict_types=1);
/**
 * @author Anikeev Dmitry <dm.anikeev@gmail.com>
 */

namespace ElegantBro\Arrayee\Tests\Diff;

use ElegantBro\Arrayee\Diff\ByKeys;
use ElegantBro\Arrayee\Just;
use PHPUnit\Framework\TestCase;
use Exception;

class ByKeysTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testDiff(): void
    {
        $this->assertEquals(
            ['blue' => 1, 'red' => 2],
            (new ByKeys(
                new Just(['green' => 5, 'yellow' => 7, 'cyan' => 8]),
                new Just(['purple' => 4, 4 => 'purple', 'cyan' => 8])
            ))->diff(new Just(['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4]))
        );
    }
}
