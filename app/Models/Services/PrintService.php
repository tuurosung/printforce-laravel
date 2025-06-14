<?php

namespace App\Models\Services;

use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrintService extends Model
{
    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->service_id = generateRandomString();
            $service->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['subscriber_id', 'service_id', 'service_name', 'category_id', 'individual', 'artist', 'institution'];


    public static function getAllServices()
    {
        return Cache::remember('all_services', 60 * 60 * 24, function () {
            return Service::all();
        });
    }

    public static function generateServiceId()
    {
        $count = PrintService::withoutGlobalScope('status')->count() + 1;
        $service_id = str_pad($count, 6, "0", STR_PAD_LEFT);

        return $service_id;
    }
}
