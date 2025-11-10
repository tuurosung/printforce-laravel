<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SubscriberScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
       $builder->where('subscriber_id', Auth::user()->subscriber_id);

        // Automatically set subscriber_id when creating a new model instance
        $model->creating(function ($model) {
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }
}
