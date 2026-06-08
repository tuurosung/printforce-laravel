<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Data;
use Throwable;

abstract class BaseRepository
{
    public function __construct(
        protected readonly Model $model,
    ) {}


    public function create(array $data): Model
    {
        return $this->transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }


    public function update(Model $model, array $data): Model
    {
        $model->update($data);
        return $model->refresh();
    }


    public function delete(Model $model): void
    {
        $model->delete();
    }



    /**
     * Execute a callable inside a DB transaction.
     * Rolls back and re-throws on any exception — ACID compliance.
     *
     * @throws Throwable
     */
    protected function transaction(callable $callback): mixed
    {
        return DB::transaction(function () use ($callback) {
            return $callback();
        });
    }


    /**
     * Execute a callable, catch and log any exception, and return null on failure.
     * Use for non-critical side-effects (e.g. sending receipts).
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
