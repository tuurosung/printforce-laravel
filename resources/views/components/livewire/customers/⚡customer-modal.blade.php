<?php

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Models\Customer;
use App\Enums\Customers\CustomerCategoryEnum;
use App\Livewire\Forms\CustomerForm;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    use \App\Traits\ModalInteractions;

    public CustomerForm $form;
    public bool $editing = false;

    public Customer $customer;

    protected CustomerRepositoryInterface $customers;

    public function boot(CustomerRepositoryInterface $customers): void
    {
        $this->customers = $customers;
    }

    #[Override]
    protected function modalId(): string
    {
        return 'customer-modal';
    }


    #[On('new-customer')]
    public function create()
    {
        $this->openModal();
    }


    #[On('edit-customer')]
    public function update(Customer $customer)
    {
        $this->customer = $customer;
        $this->form->setFrom($customer);
        $this->editing = true;

        // $this->customer = $customer;
        $this->resetErrorBag();
        $this->openModal();
    }


    #[On('delete-customer')]
    public function delete(Customer $customer)
    {
        $this->customer = $customer;

        try {

            $this->customers->delete($customer);
        } catch (\Throwable $e) {

            report($e);

            $this->dispatch(
                'notify',
                message: "Unable to delete customer" . $e->getMessage(),
                type: 'error'
            );

            return;
        }

        $this->dispatch(
            'notify',
            message: "Customer deleted successfully",
            type: 'success'
        );
    }


    #[Computed]
    public function categories()
    {
        return CustomerCategoryEnum::options();
    }

    #[Computed]
    public function idempotenyKey(): string
    {
        return \Str::uuid();
    }


    public function save(): void
    {
        $this->form->validate();
        $data = $this->form->toData();

        try {

            $this->editing
                ? $this->customers->update($this->customer, $data)
                : $this->customers->create($data);
        } catch (\Throwable $e) {

            report($e);

            $this->dispatch(
                'notify',
                message: "Unable to create customer" . $e->getMessage(),
                type: "error"
            );

            return;
        }

        $this->closeModal();
        $this->dispatch(
            'notify',
            message: $this->editing ? "Customer information updated successfully" : "Customer created successfully",
            type: 'success'
        );
    }
};
?>

<div>
    <x-modals.modal modalId="{{ $this->modalId() }}">
        <x-modals.modal-header modalTitle='{{ $this->editing ? "Update Customer Information" : "New Customer" }}' />

        <form wire:submit="save">

            <div class="p-6">

                <div class="mb-8">
                    <x-printforce.inputs.text-input name="form.name" id="form.name" label="Customer Name" value="{{ $this->form->name }}" wire:model="form.name" />
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="col">
                        <x-printforce.inputs.text-input name="form.phone" id="form.phone" label="Phone Number" value="{{ $this->form->phone }}" wire:model="form.phone" />
                    </div>
                    <div class="col">
                        <x-printforce.inputs.select-input name="form.category" label="Category" :options="$this->categories" :selected="$this->form->category" wire:model="form.category" />
                    </div>
                </div>

            </div>


            <x-modals.modal-footer modalId="{{ $this->modalId() }}" btnLabel='{{ $this->editing ? "Update Customer" : "Create Customer" }}' wire:target="save" />

        </form>
    </x-modals.modal>

    @script
    <script>
        window.confirmDelete = (customer) => {
            const callback = () => Livewire.dispatch('delete-customer', {
                customer
            });
            swalConfirm(callback, 'Do you want to delete this customer?');
        };
    </script>
    @endscript


</div>
