<?php

declare(strict_types = 1);

namespace App\Domain\Accounts\Contracts;

use App\Models\Accounting\OperatingAccount;
use Carbon\CarbonInterface;

interface AccountRepositoryInterface
{
    public function lockForPosting(string $accountId): OperatingAccount;

    public function touchLastTransaction(OperatingAccount $account, CarbonInterface $at): void;
}
