<?php

namespace App\Enums\Accounts;

enum AccountChannel: string
{
    case Cash = 'cash';
    case Momo = 'momo';
    case Bank = 'bank';


    public function label(): string
    {
        return match ($this) {
            self::Cash => 'Cash',
            self::Momo => 'Momo',
            self::Bank => 'Bank'
        };
    }
}
