<?php

namespace  Src\Products\Domain\ValueObjects;

class Sku
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('The SKU value cannot be empty.');
        }

        if (strlen($value) != 10) {
            throw new \InvalidArgumentException('The SKU value must be 10 characters long.');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
