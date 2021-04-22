<?php

namespace App\Boilerplates;

use Illuminate\Support\Collection;

class BoilerplateRepository
{

    public static function getAll(): Collection
    {
        return collect([
            new Laravel(),
            new Php()
        ]);
    }

    public static function findForBoilerplateType(string $type): BaseBoilerplate
    {
        return self::getAll()->first(function ($boilerplate) use ($type) {
            return $boilerplate->type() === $type;
        });
    }
    
}