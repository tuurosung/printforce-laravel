<?php

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Enums\Customers\CustomerCategoryEnum;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    protected CustomerRepositoryInterface $customerRepositoryInterface;
    public ?Collection $customers = null;

    public ?string $search = '';
    public ?CustomerCategoryEnum $category_filter = null;


    public function boot(CustomerRepositoryInterface $customerRepositoryInterface): void
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }


    public function mount(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customers = $customerRepositoryInterface->getLatestCustomers();
    }


    public function updatedSearch(string $value): void
    {
        $this->customers = $this->customerRepositoryInterface->filterCustomers($value);
    }

    public function updatedCategoryFilter(CustomerCategoryEnum $category): void
    {
        $this->customers = $this->customerRepositoryInterface->filterByCategory($category);
    }


};
?>

<div id="">

    <div class="grid grid-cols-4 gap-6 mb-5">
        <div>
            <input type="text" name="search" wire:model.live.debounce.300ms="search" placeholder="search"  class="form-control" />

        </div>
        <div>
            <select name="category_filter"wire:model.live="category_filter" id="" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach (App\Enums\Customers\CustomerCategoryEnum::options() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <table class="table">
        <thead
            class="">
            <tr>
                <th scope="col" class="">
                    #
                </th>
                <th scope="col" class="">
                    Date Created
                </th>
                <th scope="col" class="">
                    Customer Name
                </th>
                <th scope="col" class="">
                    Type
                </th>
                <th scope="col" class="">
                    Phone
                </th>
                <th scope="col" class="text-end">
                    Debit
                </th>
                <th scope="col" class="text-end">
                    Credit
                </th>
                <th scope="col" class="text-end">
                    Balance
                </th>
                <th scope="col" class="text-end">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->customers as $customer)
            <tr class="">
                <td >
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $customer->created_at?->format('Y-m-d') }}
                </td>
                <td>
                    <a href="{{ route('customers.show', [$customer]) }}" class="underline">
                        {{ $customer->name }}
                    </a>
                </td>
                <td>
                    {{ $customer->category?->label() }}
                </td>
                <td>
                    {{ $customer->phone }}
                </td>
                <td class="text-end">
                    {{ $customer->ledger->debit }}
                </td>
                <td class="text-end">
                    {{ $customer->ledger->credit }}
                </td>
                <td class="text-end">
                    {{ $customer->ledger->balance < 0 ? "(". (abs($customer->ledger->balance)) . ")" : $customer->ledger->balance }}
                </td>
                <td class="text-end">
                    <a
                        href="javascript:void(0)"
                        onclick="Livewire.dispatch('edit-customer', {customer: '{{ $customer->customer_id  }}' })"
                        class="text-blue-600 me-1">
                        <i class="fi fi-rr-edit"></i>
                        Edit
                    </a>
                    @can('administrator')
                    <a
                        href="javascript:void(0)"
                        onclick="confirmDelete('{{ $customer->customer_id }}')"
                        class="text-danger">
                        <i class="fi fi-rr-trash"></i>
                        Delete
                    </a>
                    @endcan

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
