<?php

namespace Src\Carts\Domain;

use Src\Shared\Domain\ValueObjects\Id;

class CartEntity
{
    private $id;


    public function __construct()
    {

    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function setId(Id $id): void
    {
        $this->id = $id ;
    }

}
