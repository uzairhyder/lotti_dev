<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brand extends FormRequest
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

            'brand_name'=>'required|max:50',
        ];
    }

    public function messages()
    {
            return[
                'brand_name.required' => 'Brand Name Field is required',
            ];
    }

    // update work 12 comment fields
}
