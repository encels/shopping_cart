<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Domain\ValueObjects\Name;
use InvalidArgumentException;

class NameTest extends TestCase
{
    public function testValidName()
    {
        $name = new Name('Product Name');

        $this->assertEquals('Product Name', $name->getValue());
    }

    public function testInvalidNameLength()
    {
        $this->expectException(InvalidArgumentException::class);

        new Name(str_repeat('a', 256));
    }

    public function testEmptyName()
    {
        $this->expectException(InvalidArgumentException::class);

        new Name('');
    }
}