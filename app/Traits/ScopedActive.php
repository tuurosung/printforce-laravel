<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopedActive
{
    public static function bootScopedActive()
    {
        static::addGlobalScope('active', function (Builder $builder){
            $builder->where('status', 'active');
        });
    }
}
