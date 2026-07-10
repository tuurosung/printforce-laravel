<?php

namespace App\Http\Requests\Customers;


use App\DTOs\Customers\CustomerData;
use App\Enums\Customers\CustomerCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        $rules = (new StoreCustomerRequest())->rules();

        return [
            ...$rules,
        ];
    }


    public function toData(): CustomerData
    {
        return new CustomerData(
            name: $this->string('name'),
            phone: $this->string('phone'),
            category: CustomerCategoryEnum::from($this->string('category')),
        );
    }
}
