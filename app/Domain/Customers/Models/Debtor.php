<?php

namespace App\Domain\Customers\Models;

use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([SubscriberScope::class])]
class Debtor extends Model
{
    protected $table = 'customers_view';


    #[Scope]
    protected function owing(Builder $query): Builder
    {
        return $query->where('balance', '>', 0);
    }
}
