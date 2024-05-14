<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenditureHeader extends Model
{
    use HasFactory;

    protected $table = 'expenditure_headers';
    protected $primaryKey = 'header_id';

    public $incrementing = false;
}
