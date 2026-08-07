<?php


declare(strict_types=1);

namespace App\Domain\Accounts\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\Accounts\Models\OperatingAccount;
use App\DTOs\Accounts\AccountData;

interface AccountServiceInterface extends BaseInterface
{

    public function createAccount(AccountData $accountData): OperatingAccount;
    public function updateAccount(OperatingAccount $operatingAccount, AccountData $data): bool;
    public function deleteAccount(OperatingAccount $operatingAccount):  bool;

}
