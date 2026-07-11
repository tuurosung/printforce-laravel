<?php

namespace App\Http\Requests\PrintServices;

use App\DTOs\Services\ServiceData;
use App\Enums\Services\ServiceCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewPrintServiceRequest extends FormRequest
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
            'service_name' => 'required',
            'category_id' => 'required',
            'individual' => 'required|numeric',
            'artist' => 'required|numeric',
            'institution' => 'required|numeric',
        ];
    }


    public function toData(): ServiceData
    {
        return new ServiceData(
            serviceId: $this->string('service_id'),
            serviceCategory: ServiceCategoryEnum::from($this->string('category_id')),
            serviceName: $this->string('service_name'),
            individual: $this->float('individual'),
            artist: $this->float('artist'),
            institution: $this->float('institution'),
        );
    }
}
