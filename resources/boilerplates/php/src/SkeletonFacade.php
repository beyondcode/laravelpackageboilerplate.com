<?php

namespace :vendor_namespace\Skeleton;

use Illuminate\Support\Facades\Facade;

/**
 * @see \:vendor_namespace\Skeleton\SkeletonClass
 */
class SkeletonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'skeleton';
    }
}
