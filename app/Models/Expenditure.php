<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;
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

    public function headers()
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
}
