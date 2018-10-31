<?php

namespace Jagalan\AmazonAdvertisingApi\Facades;

use Illuminate\Support\Facades\Facade;

class AmazonAdvertisingApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'amazonadvertisingapi';
    }
}
