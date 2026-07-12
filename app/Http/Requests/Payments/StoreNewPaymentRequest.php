<?php

namespace App\Http\Requests\Payments;

use App\DTOs\Payments\PaymentData;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewPaymentRequest extends FormRequest
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
            'amount_paid' => 'required|numeric',
            'customer_id' => 'required',
            'account_number' => 'required',
            'payment_date' => 'required'
        ];
    }


    public function toData(): PaymentData
    {
        return new PaymentData(
            customerId: $this->string('customer_id'),
            amountPaid: $this->float('amount_paid'),
            accountNumber: $this->string('account_number'),
            paymentDate: $this->string('payment_date'),
        );
    }


    public function alertData(): array
    {
        return $this->only([
            'customer_id',
            'amount_paid'
        ]);
    }
}
