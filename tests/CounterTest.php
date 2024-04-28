<?php

namespace Christian\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\RequiresOperatingSystemFamily;
use PHPUnit\Framework\Attributes\RequiresPhp;

class CounterTest extends TestCase 
{
    private Counter $counter;

    protected function setUp(): void 
    {
        $this->counter = new Counter();
        echo "Membuat Counter" . PHP_EOL;
    }

    public function testIncrement()
    {
        self::assertEquals(0, $this->counter->getCounter());
        self::markTestIncomplete("TODO do counter again");
        echo "Test" . PHP_EOL;
    }

    public function testCounter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());

        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
    }

    #[Test]
    public function increment()
    {
        self::markTestSkipped("Masih ada error yang bingung");

        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    #[Depends('testFirst')]
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

    protected function tearDown(): void
    {
        echo "Tear Down" . PHP_EOL;
    }

    #[RequiresOperatingSystemFamily('Windows')]
    public function testOnlyWindows()
    {
        self::assertTrue(true, "Only in Windows");
    }
    
    #[RequiresPhp('>= 8')]
    #[RequiresOperatingSystemFamily('Darwin')]
    public function testOnlyForMacAndPHP8()
    {
        self::assertTrue(true, "Only for Mac and PHP 8");
    }
}