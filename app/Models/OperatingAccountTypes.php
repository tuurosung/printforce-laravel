<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Operator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperatingAccountTypes extends Model
{
    use HasFactory;

    protected $table = 'account_types';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function accounts()
    {
        return $this->hasMany(OperatingAccount::class, 'acc_type');
    }

    public function headers()
    {
        return $this->hasMany(OperatingAccountHeader::class, 'type');
    }

    public static function getAccountTypes()
    {
        return Cache::remember('account_types', 60*60, function () {
            return OperatingAccountTypes::with('headers.accounts')
            ->get();
        });
    }
}
