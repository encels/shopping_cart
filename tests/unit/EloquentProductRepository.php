<?php

namespace Tests;

use Src\Products\Infrastructure\Tests\EloquentProductRepositoryTest;

class EloquentProductRepository extends TestCase
{
    
    public function test(){
        EloquentProductRepositoryTest::testCanGetById();
    }
}
