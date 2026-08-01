<?php

declare(strict_types=1);

namespace App\Domain\Accounts\Services;

use App\Domain\Accounts\Contracts\AccountServiceInterface;
use App\Domain\Accounts\Models\OperatingAccount;
use App\Services\BaseService;

final class AccountService extends BaseService implements AccountServiceInterface
{
    public function __construct(){}


    public function modelClass(): string
    {
        return OperatingAccount::class;
    }


    public function filterByType(string $type)
    {

    }
}
