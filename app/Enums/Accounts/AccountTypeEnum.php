<?php

declare(strict_types=1);

namespace App\Enums\Accounts;

use App\Domain\Accounts\Models\OperatingAccount;
use App\Traits\Cacheable;
use App\Traits\System\EnumTrait;

enum AccountTypeEnum: string
{
    use Cacheable;
    use EnumTrait;

    case Asset = '1';
    case Equity = '2';
    case Liability = '3';
    case Income = '4';
    case Expenditure = '5';



    public function slug()
    {
        return match ($this) {
            self::Asset => 'asset',
            self::Equity => 'equity',
            self::Liability => 'liability',
            self::Income => 'income',
            self::Expenditure => 'expense'
        };
    }


    public function isDebitNormal():bool
    {
        return match ($this) {
            self::Asset, self::Expenditure => true,
            self::Income, self::Liability => false
        };
    }


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
