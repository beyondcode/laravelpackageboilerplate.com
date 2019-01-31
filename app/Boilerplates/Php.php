<?php

namespace App\Boilerplates;


class Php extends BaseBoilerplate
{
    public function type(): string
    {
        return 'php';
    }

    public function location(): string
    {
        return resource_path('boilerplates/php/');
    }

}