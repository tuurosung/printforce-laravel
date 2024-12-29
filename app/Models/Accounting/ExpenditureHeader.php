<?php

namespace App\Models\Accounting;

use Carbon\Carbon;
use DateTimeInterface;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenditureHeader extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($expenditureHeader) {
            $expenditureHeader->header_id = generateDashedRandomNumber();
            $expenditureHeader->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'expenditure_headers';
    protected $primaryKey = 'header_id';

    public $incrementing = false;


    public static function getExpenditureHeaders()
    {

        return Cache::remember('expenditure_headers', 60*60, function () {
            return ExpenditureHeader::all();
        });
    }



}
