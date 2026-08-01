<?php

declare(strict_types=1);

namespace App\Enums\Accounts;

use App\Domain\Accounts\Models\OperatingAccount;
use App\Traits\Cacheable;
use Illuminate\Support\Collection;

enum AccountTypeEnum: string
{
    use Cacheable;

    case Asset = '1';
    case Equity = '2';
    case Liability = '3';
    case Income = '4';
    case Expenditure = '5';


    public function accounts()
    {
        return $this->rememberCache(
            $this->name,
            function(){
                return OperatingAccount::inType($this)->get();
            }
        );

    }


    public function accountsArray(): array
    {
        return $this->accounts()->mapWithKeys(function($account){
            return [
                $account->account_number => $account->account_name
            ];
        })->toArray();
    }
}
