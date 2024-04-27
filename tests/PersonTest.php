<?php

namespace Christian\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testSuccess()
    {
        $person = new Person("Christian");
        self::assertEquals("Hi Budi, my name is Christian", $person->sayHello("Budi"));
    }

    public function testException() 
    {
        $person = new Person("Christian");
        $this->expectException(\Exception::class);
        $person->sayHello(null);
    }

    public function testOutput() 
    {
        $person = new Person("Christian");
        $this->expectOutputString("Good bye Budi" . PHP_EOL);
        $person->sayGoodBye("Budi");
    }
}