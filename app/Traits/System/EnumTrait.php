<?php

namespace App\Traits\System;

trait EnumTrait
{
    public function label(): string
    {
        return str($this->name)
            ->replace('_', ' ')
            ->title();
    }


    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->label(),
            ])
            ->toArray();
    }


    public static function values(): array
    {
        return collect(self::cases())
            ->pluck('value')
            ->toArray();
    }
}
