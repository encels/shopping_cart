<?php

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\IdException;

class Id
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new IdException('Invalid id');
        }
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
