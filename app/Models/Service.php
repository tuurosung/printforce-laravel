<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;

    protected $fillable = ['subscriber_id', 'service_id', 'service_name', 'category_id', 'individual', 'artist', 'institution'];
}
