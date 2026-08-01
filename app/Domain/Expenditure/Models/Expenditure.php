<?php

namespace App\Domain\Expenditure\Models;

use App\Domain\Accounts\Models\OperatingAccount;
use App\Enums\PaymentMethodsEnum;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Expenditure\ExpenditureObserver;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ExpenditureObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'payment_method', 'source_account_id', 'destination_account_id', 'amount', 'narration', 'date', 'reference', 'drawee', 'idempotency_key'])]
class Expenditure extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'expenditure';
    protected $primaryKey = 'expenditure_id';
    public $incrementing = false;


    protected function casts(): array
    {
        return [
            'payment_method' => PaymentMethodsEnum::class
        ];
    }


    public function destination(): BelongsTo
    {
        return $this->belongsTo(OperatingAccount::class, 'destination_account_id', 'account_number')
            ->withDefault([
                'account_name' => 'Undefined'
            ]);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(OperatingAccount::class, 'source_account_id', 'account_number')
            ->withDefault([
                'account_name' => 'Undefined'
            ]);
    }
}
