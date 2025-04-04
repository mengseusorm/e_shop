<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MerchantRequest extends FormRequest
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
            'type'          => ['string'],
            'merchant_name' => [
                'required',
                'string',
                Rule::unique('merchants','merchant_name')->ignore($this->route('merchant'))
            ],
            'country_code_id'  => ['required'],
            'address'       => ['required','string'],
            'phone_number'  => ['required','string'],
            'dob'           => ['required','string'],   
        ];
    }
}
