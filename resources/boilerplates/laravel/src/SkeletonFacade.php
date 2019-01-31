<?php

namespace :vendor_namespace;

use Illuminate\Support\Facades\Facade;

/**
 * @see \:vendor_namespace\Skeleton\SkeletonClass
 */
class :studly_package_nameFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ':package_name';
    }
}
