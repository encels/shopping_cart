<?php

namespace  Src\Products\Domain\ValueObjects;

use Src\Products\Domain\Exceptions\NameException;

class Name
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new NameException('The name value cannot be empty.');
        }

        if (strlen($value) > 255) {
            throw new NameException('The name value must be 255 characters as maximum.');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
