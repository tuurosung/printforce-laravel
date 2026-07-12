<?php

namespace App\Services;

use App\Contracts\BaseInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService implements BaseInterface
{
    abstract protected function modelClass(): string;

    protected string $selectOptionKey = "key";
    protected string $selectOptionValue = "value";


    public function getAll(): Collection
    {
        return $this->bQuery()->get();
    }


    public function findById(string $id): ?Model
    {
        return $this->bQuery()->findOrFail($id);
    }


    public function optionsForSelect(): array
    {
        $model = new($this->modelClass());

        return $this->bQuery()
            ->orderBy($this->selectOptionKey)
            ->pluck($this->selectOptionValue, $this->selectOptionKey)
            ->toArray();
    }


    protected function bQuery(): Builder
    {
        return $this->modelClass()::query();
    }
}
