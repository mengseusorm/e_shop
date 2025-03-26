<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryCodeRequest extends FormRequest
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
            'country_name' => ['required','string',Rule::unique('countrie_codes','country_name')->ignore($this->route('countryCode'))],
            'country_code' => ['required','string',],
            'zip'          => ['required','string',]
        ];
    }
}
