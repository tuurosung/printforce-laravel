<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Operator;

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
}
