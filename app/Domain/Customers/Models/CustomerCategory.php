<?php

namespace App\Domain\Customers\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    public $incrementing = false;


    public static function getCategories()
    {
        return Cache::rememberForever('customer_categories', function () {
            CustomerCategory::all();
        });
    }
}
