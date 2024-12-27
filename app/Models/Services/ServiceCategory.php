<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';
    protected $primaryKey = 'category_id';
    public $incrementing = false;

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public static function getAllCategories()
    {
        return Cache::rememberForever('service_categories', function () {
            return ServiceCategory::all();
        });
    }
}
