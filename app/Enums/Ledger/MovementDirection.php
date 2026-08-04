<?php

namespace App\Enums\Ledger;

enum MovementDirection: string
{
    case Inflow = 'inflow';
    case Outflow = 'outflow';


    public function opposite(): self
    {
        return match($this) {
            self::Inflow => self::Outflow,
            self::Outflow => self::Inflow
        };
    }


    public function label(): string
    {
        return match ($this) {
            self::Inflow => 'Inflow',
            self::Outflow => 'Outflow'
        };
    }
}
