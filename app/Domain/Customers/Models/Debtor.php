<?php

namespace App\Domain\Customers\Models;

use App\Models\Scopes\SubscriberScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([SubscriberScope::class])]
class Debtor extends Model
{
    protected $table = 'debtors_view';
}
