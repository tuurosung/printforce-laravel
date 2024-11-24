<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopedToSubscriber
{
    public static function bootScopedToSubscriber()
    {
        static::addGlobalScope('subscriber_id', function (Builder $builder){
            $builder->where('subscriber_id', auth()->user()->subscriber_id);
        });
    }
}
