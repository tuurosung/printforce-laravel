<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

abstract class BaseService
{
    /**
     * Execute a callable inside a DB transaction.
     * Rolls back and re-throws on any exception — ACID compliance.
     *
     * @template T
     * @param  callable(): T  $callback
     * @return T
     *
     * @throws Throwable
     */
    protected function transaction(callable $callback): mixed
    {
        return DB::transaction(function() use ($callback){
            return $callback();
        });
    }


    /**
     * Execute a callable, catch and log any exception, and return null on failure.
     * Use for non-critical side-effects (e.g. sending receipts).
     *
     * @template T
     * @param  callable(): T  $callback
     * @return T|null
     */
    protected function attempt(callable $callback): mixed
    {
        try {
            return $callback();
        } catch (Throwable $e) {
            Log::error(static::class . ' attempt failed:  ' . $e->getMessage(), [
                'exception' => $e
            ]);

            return null;
        }
    }
}
