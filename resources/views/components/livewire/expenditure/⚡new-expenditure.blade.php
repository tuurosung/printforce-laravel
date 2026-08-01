<?php


use App\Domain\Expenditure\Models\Expenditure;
use App\Domain\Expenditure\Services\ExpenditureService;
use App\Enums\Accounts\AccountTypeEnum;
use App\Livewire\Forms\ExpenditureForm;
use App\Services\Accounting\AccountService;
use App\Traits\ModalInteractions;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    use ModalInteractions;

    public ExpenditureForm $form;
    public bool $editing = false;

    public ?Expenditure $expenditure;

    protected AccountService $accountSerice;
    protected ExpenditureService $expenditureService;

    public function boot(ExpenditureService $expenditureService): void
    {
        $this->expenditureService = $expenditureService;
    }


    protected function modalId(): string
    {
        return 'new-expenditure-modal';
    }

    #[On('newExpenditure')]
    public function create(): void
    {
        $this->form->reset();
        $this->form->date = now()->toDateString();
        $this->form->idempotency_key = (string) \Illuminate\Support\Str::uuid();

        $this->editing = false;
        $this->expenditure = null;

        $this->openModal();
    }

    #[On('editExpenditure')]
    public function edit(Expenditure $expenditure): void
    {
        $this->expenditure = $expenditure;   // was never set — update() relied on it
        $this->form->setFrom($expenditure);
        $this->editing = true;

        $this->resetErrorBag();
        $this->openModal();
    }


    #[On('delete-expenditure')]
    public function delete(Expenditure $expenditure): void
    {
        try {
            $this->expenditureService->deleteExpenditure($expenditure);
            $this->dispatch('delete-successful');
        } catch (\Throwable $e) {
            report($e);
            $this->dispatch('notify', message: 'Could not delete the expenditure.', type: 'error');
        }
    }


    #[Computed]
    public function expenditureHeaders()
    {
        return AccountTypeEnum::Expenditure->accountsArray();
    }


    #[Computed]
    public function assetAccounts()
    {
        return AccountTypeEnum::Asset->accountsArray();
    }


    #[Computed]
    public function idempotencyKey(): string
    {
        return \Str::uuid();
    }

    public function save(): void
    {
        $this->form->validate();

        $data = $this->form->toData();

        try {

            $this->editing
                ? $this->expenditureService->updateExpenditure($this->expenditure, $data)
                : $this->expenditureService->createExpenditure($data);

        } catch (\Throwable $e) {

            report($e);
            $this->dispatch('notify', message: 'Could not save the expenditure.', type: 'error');
            return;
        }

        $this->closeModal();
        $this->dispatch(
            'save-successful',
            message: $this->editing ? 'Expenditure updated successfully' : 'Expenditure created successfully',
        );
    }

};

?>
<div>
    <x-modals.modal modalId="new-expenditure-modal">
        <x-modals.modal-header modalId="new-expenditure-modal" modalTitle='{{ $editing ? "Update Expenditure" : "New Expenditure" }}' />

        <form id="" autocomplete="off" wire:submit="save">
            @csrf

            <input type="hidden" name="idempotency_key" value="{{ $this->idempotency_key }}" required />

            <div class="p-6">

                @if ($errors->any())
                <ul class="text-red-600 text-sm">
                    @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
                @endif

                <div class="grid grid-cols-12 gap-6 mb-5">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" id="" class="form-control" wire:model="form.payment_method">
                                <option value="">--- Select Option ---</option>
                                @foreach (App\Enums\PaymentMethodsEnum::options() as $key => $value)
                                <option value="{{ $key }}" {{ $key === $this->form->payment_method ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('form.payment_method') <span class="text-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-6">
                        <x-printforce.inputs.date-input name="date" label="Expenditure Date" value="{{ $this->form->date }}" wire:model="form.date" required />
                    </div>
                </div>


                <div class="grid grid-cols-12 gap-6 mb-3">
                    <div class="col-span-6">
                        <x-printforce.inputs.select-input name="destination_account_id" label="Expenditure Header" wire:model="form.destination_account_id" :options="$this->expenditure_headers" :selected="$this->form->destination_account_id" required />
                    </div>
                    <div class="col-span-6">
                        <x-printforce.inputs.select-input name="source_account_id" label="Source Account" wire:model="form.source_account_id" :options="$this->asset_accounts" :selected="$this->form->source_account_id" required />
                    </div>
                </div>


                <div class="grid grid-cols-12 gap-6 mb-5">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Amount</label>
                            <input
                                type="number"
                                class="form-control "
                                step="any"
                                min="0"
                                name="amount"
                                wire:model="form.amount"
                                value="{{ $this->form->amount }}"
                                required />
                            @error('form.amount') <span class="text-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-6">
                        <x-printforce.inputs.text-input
                            label="Drawee"
                            name="drawee"
                            id="drawee"
                            value="{{ $this->form->drawee }}"
                            wire:model="form.drawee"
                            placeholder="eg; Kofi Danaa" />
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 mb-3">
                    <div class="col-span-6">
                        <x-printforce.inputs.text-input label="Transaction Reference / Cheque Number" name="reference" id="reference" placeholder="eg: 6549551" value="{{ $this->form->reference }}" wire:model="form.reference" />
                    </div>
                    <div class="col-span-6">
                        <x-printforce.inputs.text-input name="narration" label="Narration" value="{{ $this->form->narration }}" wire:model="form.narration" required class="mb-5" />
                    </div>
                </div>

            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                <button type="button"
                    class="btn text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#new-expenditure-modal">
                    Close
                </button>
                <button type="submit"
                    wire:target="save"
                    class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 cursor-pointer">
                    <i class="fi fi-rr-check me-3"></i>
                    {{ $this->editing ? "Update Expenditure" : "Create Expenditure" }}
                </button>
            </div>

        </form>
    </x-modals.modal>



    @script
    <script>

        $wire.on('open-overlay', ({
            id
        }) => window.HSOverlay.open(document.querySelector('#' + id)));

        $wire.on('close-overlay', ({
            id
        }) => {
            window.HSOverlay.close(document.querySelector('#' + id));
            setTimeout(() => {
                document.querySelectorAll('.hs-overlay-backdrop').forEach(b => b.remove());
                document.documentElement.classList.remove('hs-overlay-body-open');
                document.body.style.removeProperty('overflow');
            }, 200);
        });

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
