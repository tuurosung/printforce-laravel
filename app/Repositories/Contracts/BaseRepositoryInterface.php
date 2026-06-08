<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

interface BaseRepositoryInterface
{
    public function create(array $data);
    public function update(Model $model, array $data);
    public function delete(Model $model);
}
