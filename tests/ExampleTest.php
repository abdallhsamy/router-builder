<?php

namespace Abdallhsamy\RouterBuilder\Tests;

use Orchestra\Testbench\TestCase;
use Abdallhsamy\RouterBuilder\RouterBuilderServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [RouterBuilderServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
