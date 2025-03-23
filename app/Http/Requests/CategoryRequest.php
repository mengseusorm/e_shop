<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            // 'image' => ['mimes:jpeg,png,jpg,gif,svg','max:2048'], 
            'category_name' => ['required','string',Rule::unique('categories','category_name')->ignore($this->route('category'))],
            'category_slug' => ['required','string'],
            'status'    => ['required','integer'],
            'description' => ['max:255']
        ];
    }
}
