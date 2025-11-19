<?php

namespace App\Services\Accounting;

use App\Models\Accounting\OperatingAccount;
use App\Traits\Cacheable;

class AccountService
{
    use Cacheable;

    protected $cacheTag = 'account_service';

    /**
     * Create a new class instance.
     */
    public function __construct(
        private $operatingAccount = new OperatingAccount()
    )
    {
        //
    }


    /**
     * Get all operating accounts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllOperatingAccounts()
    {
        return $this->rememberCache(
            'operating_accounts',
            function () {
                return $this->operatingAccount->query()
                    ->orderBy('account_name', 'asc')
                    ->get();
            },
        );
    }


    public function getAccountsArray()
    {
        return $this->getAllOperatingAccounts()
            ->mapWithKeys(
                fn($account) =>
                [
                    $account->account_number => $account->account_name
                ]
            )->toArray();
    }


    /**
     * Get all operating accounts filtered by type.
     *
     * @param int $type
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOperatingAccountsByType(int $type)
    {
        return $this->rememberCache(
            'operating_accounts_by_type_' . $type,
            function () use ($type) {
                return $this->operatingAccount->query()
                    ->where('acc_type', $type)
                    ->orderBy('account_name', 'asc')
                    ->get();
            },
        );
    }


    public function getOperatingAccountsByTypeArray(int $type)
    {
       return $this->getOperatingAccountsByType($type)
            ->mapWithKeys(
                fn($account) =>
                [
                    $account->account_number => $account->account_name
                ]
            )->toArray();
    }

    /**
     * Returns an array of all Asset Accounts (ie. Cash, Bank Accounts, etc.)
     *
     * @return array
     */
    public function getAssetAccounts(): array
    {
        return $this->getOperatingAccountsByTypeArray(1);
    }


    public function getAssetAccountList()
    {
        return $this->getOperatingAccountsByType(1);
    }
}
