<?php

declare(strict_types=1);

namespace App\Domain\Accounts\Services;

use App\Domain\Accounts\Contracts\AccountServiceInterface;
use App\Domain\Accounts\Models\OperatingAccount;
use App\DTOs\Accounts\AccountData;
use App\Models\Accounting\OperatingAccount as AccountingOperatingAccount;
use App\Services\BaseService;
use DomainException;
use Illuminate\Support\Facades\Cache;

final class AccountService extends BaseService implements AccountServiceInterface
{
    public function __construct(){}


    public function modelClass(): string
    {
        return OperatingAccount::class;
    }


    public function createAccount(AccountData $accountData): OperatingAccount
    {
       try {

            $account = OperatingAccount::create($accountData->toArray());
            $this->clearCache();

       } catch (\Exception $e) {
            throw new DomainException("Unable to create account" . $e->getMessage());
       }

       return $account;
    }


    public function updateAccount(OperatingAccount $operatingAccount, AccountData $data): bool
    {
        return false;
    }


    public function deleteAccount(OperatingAccount $operatingAccount): bool
    {
        return false;
    }


    public function filterByType(string $type)
    {

    }

    private function clearCache()
    {
        Cache::flush();
    }
}
