<?php

namespace App\Exceptions\Ledger;

use App\Models\Accounting\OperatingAccount;
use Exception;

final class AccountNotPostableException extends Exception
{
    public function __construct(OperatingAccount $account)
    {
        parent::__construct(
            "Account {$account->account_name} is {$account->status->value} and cannot be posted to"
        );
    }
}
