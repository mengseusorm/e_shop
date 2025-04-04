<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image'         => ['nullable'], 
            'product_code'  => ['nullable'],
            'name'          => ['required'], 
            'merchant_id'   => ['required'], 
            'price'         => ['required','numeric'],   
            'status'        => ['nullable','numeric'], 
            'size'          => ['nullable'], 
            'description'   => ['string','nullable'], 
            'category_id'   => ['required'],
            'country_code_id' => ['required']
        ];
    }
}
