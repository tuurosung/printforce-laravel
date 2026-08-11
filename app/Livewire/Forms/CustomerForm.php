<?php

namespace App\Livewire\Forms;

use App\Domain\Customers\Models\Customer;
use App\DTOs\Customers\CustomerData;
use App\Enums\Customers\CustomerCategoryEnum;
use App\Rules\PhoneRule;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?string $customerId = null;
    public ?string $name = '';
    public ?string $phone = '';
    public ?string $category = '';


    protected function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => [
                'required',
                new PhoneRule(),
                Rule::unique(Customer::class)
                    ->where('subscriber_id', session('active_subscriber'))
                    ->ignore($this->customerId, 'customer_id'),
            ],
            'category' => ['required']
        ];
    }


    public function setFrom(Customer $customer)
    {
        $this->customerId = $customer->customer_id;
        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->category = $customer->category->value;
    }


    public function toData(): CustomerData
    {
        return new CustomerData(
            name: $this->name,
            phone: $this->phone,
            category: CustomerCategoryEnum::from($this->category)
        );
    }
}
