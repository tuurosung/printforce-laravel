<?php

namespace App\Models\Accounting;

use Carbon\Carbon;
use DateTimeInterface;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\ExpenditureHeader;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenditure extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($expenditure) {
            $expenditure->expenditure_id = generateDashedRandomNumber();
            $expenditure->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'expenditure';
    protected $primaryKey = 'expenditure_id';
    public $incrementing = false;

    protected $fillable = [
        'subscriber_id',
        'expenditure_id',
        'amount',
        'date',
        'description',
        'header_id',
        'account_number'
    ];

    public function header()
    {
        return $this->belongsTo(ExpenditureHeader::class, 'header_id');
    }

    public function account()
    {
        return $this->belongsTo(OperatingAccount::class, 'account_number');
    }


    static function totalExpenditurePeriod($start, $end)
    {
        // return Expenditure::whereBetween('date', [$start, $end])
        // ->where('status', 'active')
        // ->where('subscriber_id', '187635294')
        // ->sum('amount');
        return Expenditure::whereSubscriberId('187635294')->sum('amount');
    }

    public static function getExpenditureByPeriod()
    {
        $today = Carbon::now();
        $beginingOfWeek = $today->copy()->startOfWeek();
        $beginingOfMonth = $today->copy()->startOfMonth();
        $beginingOfYear = $today->copy()->startOfYear();

        return [
            'today' => self::getTotalExpenditure($today),
            'week' => self::getTotalExpenditure($beginingOfWeek, $today),
            'month' => self::getTotalExpenditure($beginingOfMonth, $today),
            'year' => self::getTotalExpenditure($beginingOfYear, $today)
        ];
    }

    private static function getTotalExpenditure(DateTimeInterface $start, DateTimeInterface $end = null)
    {
        $query = Expenditure::whereStatus('active');

        if (isset($end)) {
            $query->whereBetween('date', [$start, $end]);
        } else {
            $query->whereDate('date', $start->format('Y-m-d'));
        }

        return number_format($query->sum('amount'), 2);
    }
}
