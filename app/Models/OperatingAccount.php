<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingAccount extends Model
{

    use HasFactory;

    protected $table = 'all_accounts';
    protected $primaryKey = 'account_number';

    public $incrementing = false;



}
