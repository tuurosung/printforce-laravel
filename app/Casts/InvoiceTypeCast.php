<?php

namespace App\Casts;

use App\Enums\Invoices\InvoiceTypeEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class InvoiceTypeCast implements CastsAttributes
{
    private static $enumValues;


    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (is_null($value)) {
            return null;
        }


        if (!self::$enumValues) {

            Log::info('InvoiceTypeCast init');
            // Log::info(serialize(self::$enumValues));

            self::$enumValues = collect(InvoiceTypeEnum::cases())
                ->mapWithKeys(fn ($case) => [
                    $case->value => $case
                ])
                ->toArray();
        }

        if (isset(self::$enumValues[$value])) {
            return self::$enumValues[$value];
        }

        return collect(InvoiceTypeEnum::cases())->first(
            fn ($case) => str($case->name)->replace('_', ' ')->title()->toString() === $value
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof InvoiceTypeEnum) {
            return $value->value;
        }

        return $value;
    }
}
