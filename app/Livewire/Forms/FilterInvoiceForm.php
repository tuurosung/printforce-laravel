<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\DTOs\Invoices\FilterInvoiceData;
use Carbon\CarbonImmutable;
use Livewire\Form;

final class FilterInvoiceForm extends Form
{
    public string $startDate = '';
    public string $endDate = '';
    public ?string $customerId = null;


    public function fillFrom(FilterInvoiceData $data): void
    {
        $this->startDate = $data->from->toDateString();
        $this->endDate = $data->to->toDateString();
        $this->customerId = $data->customerId;
    }


    protected function rules(): array
    {
        return [
            'startDate' => ['required', 'date_format:Y-m-d'],
            'endDate' => ['required', 'date_format:Y-m-d', 'after_or_equal:startDate'],
            'customerId' => ['nullable', 'string'],
        ];
    }


    public function toData(): FilterInvoiceData
    {
        return new FilterInvoiceData(
            from: CarbonImmutable::parse($this->startDate)->startOfDay(),
            to: CarbonImmutable::parse($this->endDate)->endOfDay(),
            customerId: $this->customerId
        );
    }
}
