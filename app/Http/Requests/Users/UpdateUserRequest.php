<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = request()->route('user')->user_id;

        return [
            'name' => 'required|string|max:100',
            'phone_number' => [
                'required',
                'string',
                'size:10',
                Rule::unique(User::class)
                    ->ignore($userId, 'user_id')
            ],
            'access_level' => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'phone_number.required' => 'Phone number is required',
            'phone_number.size' => 'Phone number must be 10 digits',
            'phone_number.unique' => 'Another User Exists with same phone number',
            'access_level.required' => 'Access level is required',
        ];
    }
}
