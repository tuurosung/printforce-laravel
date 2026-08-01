<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\DTOs\Expenditure\NewExpenditureData;
use App\Enums\PaymentMethodsEnum;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

final class ExpenditureForm extends Form
{
    public ?string $expenditure_id = null;   // needed a default
    public ?string $payment_method = null;
    public ?string $date = '';
    public ?string $source_account_id = '';
    public ?string $destination_account_id = '';
    public string $amount = '';
    public ?string $drawee = '';
    public ?string $reference = '';
    public ?string $narration = '';
    public ?string $idempotency_key = '';


    protected function rules(): array
    {
        return [
            'payment_method'         => ['required', Rule::enum(PaymentMethodsEnum::class)],
            'date'                   => ['required', 'date'],
            'source_account_id'      => ['required', 'string'],
            'destination_account_id' => ['required', 'string', 'different:source_account_id'],
            'amount'                 => ['required', 'numeric', 'min:0.01'],
            'drawee'                 => ['nullable', 'string'],
            'reference'              => ['nullable', 'string'],
            'narration'              => ['required', 'string'], // blade marks it required
        ];
    }

    public function setFrom(object $expenditure): void
    {
        $this->expenditure_id = $expenditure->expenditure_id;
        $this->payment_method = $expenditure->payment_method->value;

        $this->date = Carbon::parse($this->date)->format('Y-m-d');

        $this->source_account_id = $expenditure->source_account_id;
        $this->destination_account_id = $expenditure->destination_account_id;
        $this->amount = $expenditure->amount; // pesewas -> cedis
        $this->drawee = $expenditure->drawee;
        $this->reference = $expenditure->reference;
        $this->narration = $expenditure->narration;
    }

    // Todo Convert values to pesewas to maintain integrity

    public function toData(): NewExpenditureData
    {
        return new NewExpenditureData(
            sourceAccountId: (string) $this->source_account_id,
            destinationAccountId: (string) $this->destination_account_id,
            amount: (float) $this->amount, // integer pesewas, single float touch
            narration: (string) $this->narration,
            date: $this->date,
            reference: $this->reference,
            drawee: (string) $this->drawee,
            paymentMethod: PaymentMethodsEnum::from($this->payment_method),
            idempotencyKey: (string) $this->idempotency_key,
        );
    }
}
