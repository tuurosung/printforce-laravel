<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SubscriberScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
       $builder->where('subscriber_id', session('active_subscriber'));

        // Automatically set subscriber_id when creating a new model instance
        $model->creating(function ($model) {
            if (session()->has('active_subscriber')) {
                $model->subscriber_id = session('active_subscriber');
            }
        });
    }
}
