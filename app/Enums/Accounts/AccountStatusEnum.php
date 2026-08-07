<?php

namespace App\Enums\Accounts;

enum AccountStatusEnum: string
{
    case Active = 'active';
    case Dormant = 'dormant';
    case Suspended = 'suspended';
    case Closed = 'closed';


    public function label(): string
    {
        return ucfirst($this->value);
    }
}
