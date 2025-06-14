<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

trait ScopedToSubscriber
{
    public static function bootScopedToSubscriber()
    {
        static::addGlobalScope('subscriber_id', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where('subscriber_id', Auth::user()->subscriber_id);
            }
        });
    }
}
