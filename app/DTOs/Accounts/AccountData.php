<?php

declare(strict_types = 1);

namespace App\DTOs\Accounts;

use App\Enums\Accounts\AccountTypeEnum;
use App\Traits\ArrayableDTO;

class AccountData
{
    use ArrayableDTO;


    /**
     * Create a new class instance.
     */
    public function __construct(
        public AccountTypeEnum $accountType,
        public string $accountName,
        public string $description
    ){}
}
