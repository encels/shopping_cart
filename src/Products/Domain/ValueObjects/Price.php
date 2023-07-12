<?php

namespace  Src\Products\Domain\ValueObjects;

use Src\Products\Domain\Exceptions\PriceException;

class Price
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new PriceException('The price value cannot be negative.');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
