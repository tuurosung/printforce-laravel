<?php

namespace App\Domain\PrintServices\Models;

use App\Domain\PrintServices\Models\PrintService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PrintServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';
    protected $primaryKey = 'category_id';
    public $incrementing = false;

    public function services()
    {
        return $this->hasMany(PrintService::class, 'category_id');
    }

    public static function getAllCategories()
    {
        return Cache::rememberForever('service_categories', function () {
            return PrintService::all();
        });
    }
}
