<?php

namespace App\Domain\PrintServices\Models;

use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Customers\Customer;
use App\Models\Scopes\SubscriberScope;
use App\Traits\ScopedActive;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

#[ScopedBy(SubscriberScope::class)]
#[Fillable(['subscriber_id', 'service_id', 'service_name', 'category_id', 'individual', 'artist', 'institution'])]
class PrintService extends Model
{
    use SoftDeletes;
    use HasFactory;
    use ScopedActive;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->service_id = generateRandomString();
            $service->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected static function booted()
    {
        static::addGlobalScope('status', function ($builder) {
            $builder->where('status', 'active');
        });

        static::updating(function ($service) {
            $service->subscriber_id = Auth::user()->subscriber_id;
        });

        static::deleting(function ($service) {
            $service->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected function casts(): array
    {
        return [

        ];
    }



    #[Scope]
    protected function inCategory(Builder $query, ServiceCategoryEnum $category): Builder
    {
        return $query->where('category_id', $category->value);
    }


    public function priceFor(Customer $customer): float
    {
        return $this->{$customer->category->priceColumn()};
    }


    public static function getAllServices()
    {
        return Cache::remember('all_services', 60 * 60 * 24, function () {
            return PrintService::all();
        });
    }

    public static function generateServiceId()
    {
        $count = PrintService::withoutGlobalScope('status')->count() + 1;
        $service_id = str_pad($count, 6, "0", STR_PAD_LEFT);

        return $service_id;
    }
}
