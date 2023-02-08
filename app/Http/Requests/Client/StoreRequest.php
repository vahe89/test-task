<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client.first_name' => 'required',
            'client.last_name' => 'required',
            'client.email' => Rule::requiredIf(is_null($this->client['phone_number'])) . '|nullable|unique:clients,email',
            'client.phone_number' => Rule::requiredIf(is_null($this->client['email'])) . '|nullable|unique:clients,phone_number',
            'loan_amount' => 'nullable|numeric|min:1',
            'property_value' => 'nullable|numeric|min:1',
            'down_payment_amount' => 'nullable|numeric|min:1',
        ];
    }


    public function messages()
    {
        return [
            'client.first_name.required' => 'First Name required',
            'client.last_name.required' => 'Last Name required',
            'client.email.required' => 'Email or Phone Number required',
            'client.phone_number.required' => 'Email or Phone Number required',
        ];
    }

}
