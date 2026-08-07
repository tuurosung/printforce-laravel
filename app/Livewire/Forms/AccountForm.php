<?php

namespace App\Livewire\Forms;

use App\DTOs\Accounts\AccountData;
use App\Enums\Accounts\AccountTypeEnum;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AccountForm extends Form
{
    public ?string $accountId = null;
    public ?string $account_type = '';
    public ?string $account_name = '';
    public ?string $description = '';


    protected function rules(): array
    {
        return [
            'account_type' => ['required', 'string', Rule::enum(AccountTypeEnum::class)],
            'account_name' => ['required', 'string'],
            'description' => ['nullable']
        ];
    }


    public function setFrom(object $operatingAccount): void
    {
        $this->accountId = $operatingAccount->accountId;
        $this->account_type = $operatingAccount->account_type;
        $this->account_name = $operatingAccount->account_name;
        $this->description = $operatingAccount->description;
    }


    public function toData(): AccountData
    {
        return new AccountData(
            accountType: AccountTypeEnum::from($this->account_type),
            accountName: (string) $this->account_name,
            description: (string) $this->description
        );
    }
}
