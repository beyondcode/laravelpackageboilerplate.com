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
        return storage_path('skeletons/php/');
    }

}
