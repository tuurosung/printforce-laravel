<?php

declare(strict_types= 1);

namespace  App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function getAll(): Collection;


    public function findById(string $id): ?Model;


    public function optionsForSelect(): array;
}
