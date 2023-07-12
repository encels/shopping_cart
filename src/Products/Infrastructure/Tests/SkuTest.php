<?php

namespace Src\Products\Infrastructure\Tests;

use Tests\TestCase;
use Src\Products\Domain\ValueObjects\Sku;
use InvalidArgumentException;

class SkuTest extends TestCase
{
    public function testValidSku()
    {
        $sku = new Sku('ABCD123456');

        $this->assertEquals('ABCD123456', $sku->getValue());
    }

    public function testInvalidSkuLength()
    {
        $this->expectException(InvalidArgumentException::class);

        new Sku('12345');
    }

    public function testEmptySkuCharacters()
    {
        $this->expectException(InvalidArgumentException::class);

        new Sku('');
    }
}
