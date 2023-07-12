<?php

namespace  Src\Products\Domain\ValueObjects;

use Src\Products\Domain\Exceptions\DescriptionException;


class Description
{
    private ?string $value;

    public function __construct(?string $value)
    {
        if (strlen($value ?? '') > 255) {
            throw new DescriptionException('The description value cannot be longer than 255 characters.');
        }

        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
