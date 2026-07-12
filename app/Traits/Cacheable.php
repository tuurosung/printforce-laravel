<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    protected function cacheTag(): string
    {
        return $this->cacheTag ?? class_basename($this);
    }

    protected function tenantKey(): string
    {
        return auth()->user()->subscriber_id;
    }

    protected function rememberCache(string $key, \Closure $callback)
    {
        $duration = 60 * 5;
        $cacheKey = $this->buildCacheKey($key);

        return Cache::remember($cacheKey, $duration, $callback);
        // return Cache::store('storage')->remember($cacheKey, $duration, $callback);
    }

    protected function forgetCache(string $key): void
    {
        if ($key) {
            Cache::forget($this->buildCacheKey($key));
            return;
        }

        Cache::flush();
    }

    protected function buildCacheKey(string $key): string
    {
        $tenantKey = $this->tenantKey();

        if (empty($tenantKey)) {
            throw new \Exception('Tenant key is not set. Ensure the user is authenticated.');
        }

        return sprintf('%s__%s', $this->tenantKey(), $key);
    }
}
