<?php

namespace :vendor_namespace\Tests;

use Orchestra\Testbench\TestCase;
use :vendor_namespace\:studly_package_nameServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [:studly_package_nameServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
