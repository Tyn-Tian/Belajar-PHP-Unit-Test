<?php

namespace Christian\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\After;

class PersonTest extends TestCase
{
    private Person $person;

    #[Before]
    public function createPerson()
    {
        $this->person = new Person("Christian");
    }

    public function testSuccess()
    {
        self::assertEquals("Hi Budi, my name is Christian", $this->person->sayHello("Budi"));
    }

    public function testException() 
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testOutput() 
    {
        $this->expectOutputString("Good bye Budi" . PHP_EOL);
        $this->person->sayGoodBye("Budi");
    }

    #[After]
    protected function after(): void 
    {
        echo "after" . PHP_EOL;
    }
}