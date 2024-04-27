<?php

namespace Christian\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestWith;

class MathTest extends TestCase
{
    public function testmanual()
    {
        self::assertEquals(10, Math::sum([5, 5]));
        self::assertEquals(20, Math::sum([4, 4, 4, 4, 4]));
        self::assertEquals(9, Math::sum([3, 3, 3]));
        self::assertEquals(0, Math::sum([]));
        self::assertEquals(2, Math::sum([2]));
        self::assertEquals(4, Math::sum([2, 2]));
    }

    #[DataProvider('mathSumData')]
    public function testDataProvider(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }

    public static function mathSumData(): array
    {
        return [
            [[5, 5], 10],
            [[4, 4, 4, 4, 4], 20],
            [[3, 3, 3], 9],
            [[], 0],
            [[2], 2],
        ];
    }

    #[TestWith([[5, 5], 10])]
    #[TestWith([[4, 4, 4, 4, 4], 20])]
    #[TestWith([[3, 3, 3], 9])]
    #[TestWith([[], 0])]
    #[TestWith([[2], 2])]
    public function testWith(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }
}
