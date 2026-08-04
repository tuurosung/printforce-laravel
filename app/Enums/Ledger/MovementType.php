<?php

namespace App\Enums\Ledger;

enum MovementType: string
{
    case Payment = 'payment'; // a customer settles what they owe -> inflow
    case Expenditure = 'expenditure'; // the tenant spends money -> outflow
    case Refund = 'refund'; // the tenant returns money to a customer -> outflow
    case Adjustment = 'adjustment'; // manual correction, may carry no source document


    public function label(): string
    {
        return match ($this) {
            self::Payment => 'Payment',
            self::Expenditure => 'Expenditure',
            self::Refund => 'Refund',
            self::Adjustment => 'Adjustment'
        };
    }

}
