<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingAccountHeader extends Model
{
    use HasFactory;

    protected $table = 'account_headers';
    protected $primaryKey = 'sn';
    public function accounts()
    {
        return $this->hasMany(OperatingAccount::class, 'account_header');
    }

    public function accountType()
    {
        return $this->belongsTo(OperatingAccountTypes::class, 'type');
    }


}
