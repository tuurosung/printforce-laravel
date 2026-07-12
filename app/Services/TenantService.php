<?php

namespace App\Services;

class TenantService
{

    private $tenant;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->tenant = auth()->user()->subscriber_id;
    }


    public function tenantCacheKey()
    {
        return "". $this->tenant;
    }
}
