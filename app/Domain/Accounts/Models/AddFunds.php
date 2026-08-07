<?php

declare(strict_types = 1);

namespace App\Domain\Accounts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFunds extends Model
{
    use HasFactory;

    protected $table = 'add_funds';
    protected $primaryKey = 'transaction_id';
    public $incrementing = false;
}
