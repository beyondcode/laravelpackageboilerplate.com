<?php

namespace App\Boilerplates;

interface Boilerplate
{
    public function type(): string;

    public function location(): string;

    public function replacements(array $input): array;

}