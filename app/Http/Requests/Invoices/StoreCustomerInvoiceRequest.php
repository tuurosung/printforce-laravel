<?php

namespace App\Http\Requests\Invoices;

use App\DTOs\Invoices\CustomerInvoiceData;
use App\Enums\Invoices\InvoiceStatusEnum;
use App\Enums\Invoices\InvoiceTypeEnum;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => [
                'required',
            ],
            'invoice_type' => ['required', 'string'],
            'invoice_date' => ['required', 'date'],
            'due_date' => ['required', 'date', 'after_or_equal:invoice_date'],
        ];
    }


    public function toData(): CustomerInvoiceData
    {
        return new CustomerInvoiceData(
            customerId: $this->string('customer_id'),
            invoiceType: InvoiceTypeEnum::from($this->string('invoice_type')->value()),
            invoiceDate: $this->string('invoice_date'),
            dueDate: $this->filled('due_date') ? CarbonImmutable::parse($this->string('due_date')->value()) : null,
            invoiceStatus: InvoiceStatusEnum::PENDING
        );
    }
}
