<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PrintServices extends Facade
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    protected static function getFacadeAccessor(): string
    {
        return 'printservices';
    }
}
