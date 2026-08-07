<?php

declare(strict_types = 1);

namespace App\Domain\Accounts\Repositories;

use App\Domain\Accounts\Contracts\AccountRepositoryInterface;
use App\Models\Accounting\OperatingAccount;
use Carbon\CarbonInterface;
use Override;

final class AccountRepository implements AccountRepositoryInterface
{
    public function lockForPosting(string $accountId): OperatingAccount
    {
        return OperatingAccount::query()
            ->lockForUpdate()
            ->findOrFail($accountId);
    }


    #[Override]
    public function touchLastTransaction(OperatingAccount $account, CarbonInterface $at): void
    {
        $account->forceFill([
            'last_transaction_date' => $at
        ])->save();
    }
}
