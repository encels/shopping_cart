<?php

namespace  Src\Products\Domain\ValueObjects;

class Description
{
    private ?string $value;

    public function __construct(?string $value)
    {
        if (strlen($value ?? '') > 255) {
            throw new \InvalidArgumentException('The description value cannot be longer than 255 characters.');
        }

        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
