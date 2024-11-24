<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;

    protected $fillable = ['subscriber_id', 'service_id', 'service_name', 'category_id', 'individual', 'artist', 'institution'];


    public static function getAllServices()
    {
        return Cache::remember('all_services', 60 * 60, function () {
            return Service::all();
        });
    }
}
