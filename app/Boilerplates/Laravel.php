<?php

namespace App\Boilerplates;

use Illuminate\Http\Request;

class Laravel extends BaseBoilerplate
{
    public function type(): string
    {
        return 'laravel';
    }

    public function location(): string
    {
        return resource_path('boilerplates/php/');
    }

    public function replacements(array $input): array
    {
        return [
            ':vendor_namespace' => studly_case(array_get($input, 'vendorName')) . '\\' . studly_case(array_get($input, 'packageName')),
            ':vendor_namespace_escaped' => studly_case(array_get($input, 'vendorName')) . '\\\\' . studly_case(array_get($input, 'packageName')),
            ':vendor' => array_get($input, 'vendorName'),
            ':package_name' => array_get($input, 'packageName'),
            ':package_description' => array_get($input, 'packageDescription'),
            ':author_username' => array_get($input, 'authorUsername'),
            ':author_name' => array_get($input, 'authorName'),
            ':author_email' => array_get($input, 'authorEmail'),
        ];
    }

}