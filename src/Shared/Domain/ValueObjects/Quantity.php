<?php

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\QuantityException;

class Quantity
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new QuantityException('Invalid quantity');
        }
        if ($value === $this->value) {
            throw new QuantityException('The quantity is the same, cannot be updated');
        }
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
