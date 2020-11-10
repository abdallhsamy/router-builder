<?php

namespace Abdallhsamy\RouterBuilder;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Abdallhsamy\RouterBuilder\Skeleton\SkeletonClass
 */
class RouterBuilderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router-builder';
    }
}
