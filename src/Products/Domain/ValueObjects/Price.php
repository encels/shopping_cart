<?php

namespace  Src\Products\Domain\ValueObjects;

class Price
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException('The price value cannot be negative.');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
