<?php

namespace  Src\Products\Domain\ValueObjects;
use Src\Products\Domain\Exceptions\SkuException;

class Sku
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new SkuException('The SKU value cannot be empty.');
        }

        if (strlen($value) != 10) {
            throw new SkuException('The SKU value must be 10 characters long.');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
