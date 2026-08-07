<?php

namespace App\Exceptions\Ledger;

use App\Models\Accounting\OperatingAccount;
use Exception;

class InsufficientFundsException extends Exception
{
    public function __construct(OperatingAccount $account, float $amount)
    {
        parent::__construct(
            "Insufficient available balance on {$account->account_name} "
            . "for a {$amount} outflow"
        );
    }
}
