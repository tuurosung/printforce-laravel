<?php

namespace App\Domain\PrintServices\Models;

use App\Domain\Customers\Models\Customer;
use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Services\PrintServiceObserver;
use App\Traits\ScopedActive;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(SubscriberScope::class)]
#[ObservedBy([PrintServiceObserver::class])]
#[Fillable(['subscriber_id', 'service_id', 'service_name', 'category_id', 'individual', 'artist', 'institution'])]
class PrintService extends Model
{
    use SoftDeletes;
    use HasFactory;
    use ScopedActive;


    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected function casts(): array
    {
        return [
            'category_id'=> ServiceCategoryEnum::class,
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



    public static function generateServiceId()
    {
        $count = PrintService::withoutGlobalScope('status')->count() + 1;
        $service_id = str_pad($count, 6, "0", STR_PAD_LEFT);

        return $service_id;
    }
}
