<?php

use App\Enums\Accounts\AccountTypeEnum;
use App\Livewire\Forms\AccountForm;
use App\Domain\Accounts\Models\OperatingAccount;
use App\Domain\Accounts\Services\AccountService;
use App\Traits\ModalInteractions;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    use ModalInteractions;

    public AccountForm $form;
    public bool $editing = false;

    protected ?OperatingAccount $operatingAccount;
    protected AccountService $accountService;

    public function boot(AccountService $accountService): void
    {
        $this->accountService = $accountService;
    }


    protected function modalId(): string
    {
        return 'account-modal';
    }


    #[On('newAccount')]
    public function create(): void
    {
        $this->openModal();
    }

    #[On('editAccount')]
    public function edit(OperatingAccount $operatingAccount): void
    {

        $this->editing = true;
        $this->openModal();
    }


    #[Computed]
    public function accountTypes()
    {
        return AccountTypeEnum::options();
    }


    public function save(): void
    {
        $this->form->validate();
        $data = $this->form->toData();

        try {

            $this->editing
                ? $this->accountService->updateAccount($this->operatingAccount, $data)
                : $this->accountService->createAccount($data);
        } catch (\Throwable $e) {

            report($e);

            $this->dispatch(
                'notify',
                message: 'Unable to save account' . $e->getMessage(),
                type: 'error'
            );

            return;
        }

        $this->closeModal();
        $this->dispatch(
            'save-successful',
            message: $this->editing ? "Account Information Updated Successfully" : "Accoun created successfully"
        );
    }
};
?>

<div>
    <x-modals.modal modalId="{{ $this->modalId() }}">

        <x-modals.modal-header modalId="{{ $this->modalId() }}" modalTitle='{{ $editing ? "Update Account" : "New Account" }}' />

        <form wire:submit="save">
            @csrf

            <div class="p-6">

                <div class="row">
                    <div class="col-md-6">

                        <x-printforce.inputs.select-input
                            label="Account Type"
                            name="form.account_type"
                            :options="$this->account_types"
                            wire:model="form.account_type" />

                    </div>
                    <div class="col-md-6">

                        <x-printforce.inputs.text-input
                            label="Account Name"
                            name="form.account_name"
                            :value="$this->form->account_name"
                            wire:model="form.account_name" />

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea
                                class="form-control "
                                name="description"
                                rows="2"
                                cols="80"
                                wire:model="form.description"></textarea>
                            @error('form.description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                <button type="button"
                    class="btn text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#new-account-modal">
                    Close
                </button>
                <button type="submit"
                    wire:target="save"
                    class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 cursor-pointer">
                    <i class="fi fi-rr-check me-3"></i>
                    {{ $this->editing ? "Update Account" : "Create Account" }}
                </button>
            </div>

        </form>

    </x-modals.modal>


    @script
    <script>
        Livewire.on('notify', ({
            message,
            type = 'success'
        }) => swalAlert(message, type));


        // Reload only AFTER the user dismisses the success alert.
        Livewire.on('save-successful', ({
            message
        }) => {
            successAlertWithCallback(message, () => window.location.reload());
        });

        Livewire.on('delete-successful', () => {
            successAlertWithCallback('Delete Successful', () => window.location.reload());
        });

        window.confirmDelete = (expenditure) => {
            const callback = () => Livewire.dispatch('delete-expenditure', {
                expenditure
            });
            swalConfirm(callback, 'Do you want to delete this expenditure?');
        };
    </script>
    @endscript
</div>
