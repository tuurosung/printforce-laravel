<?php

namespace App\Domain\Ledger\Models;

use App\Enums\Ledger\MovementDirection;
use App\Enums\Ledger\MovementType;
use App\Models\Accounting\OperatingAccount;
use App\Traits\Ledger\HasCheckSum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    use HasUuids;
    use HasCheckSum;

    protected $guarded = [];


    protected function casts(): array
    {
        return [
            'direction' => MovementDirection::class,
            'type' => MovementType::class,
            'amount' => 'float',
            'value_date' => 'date'
        ];
    }


    /**
     * Columns covered by the row-level HMAC integrity checksum. Every field that
     * defines the financial meaning of the movement is included, so tampering
     * with any of them after the fact invalidates the stored integrity_hash.
     *
     * NOTE: rename this method / property to match your actual CBS HasChecksum
     * trait contract if it differs.
     */
    public function checksumColumns(): array
    {
        return [
            'reference',
            'account_id',
            'direction',
            'amount_pesewas',
            'type',
            'source_type',
            'source_id',
            'reverses_id',
            'posted_by',
        ];
    }


    public function account(): BelongsTo
    {
        return $this->belongsTo(OperatingAccount::class, 'account_id', 'account_id');
    }


    /** The originating domain record (Payment, Expenditure, ...), if any. */
    public function source(): MorphTo
    {
        return $this->morphTo();
    }


    /** The movement that reverses this one, if it has been reversed. */
    public function reversal(): HasOne
    {
        return $this->hasOne(self::class, 'reverses_id');
    }


    /** The movement this one reverses, if it is itself a reversal. */
    public function reverses(): BelongsTo
    {
        return $this->belongsTo(self::class, 'reverses_id');
    }
}
