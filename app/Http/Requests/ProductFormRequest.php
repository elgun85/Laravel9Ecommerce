<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id'=>'required|string|max:250',
            'name'=>'required|string|max:250',
            'brand'=>'required|string|max:250',
            'small_description'=>'nullable|nullable|string|max:250',
            'description'=>'nullable|string|max:250',

            'original_price'=>'required|max:99999|numeric|between:0,99.99',
            'selling_price'=>'required|max:99999|numeric|between:0,99.99',
            'quantity'=>'required|integer|max:99999',
            'trending'=>'nullable',
            'status'=>'nullable',


            'meta_title'=>'nullable|string|max:250',
            'meta_keyword'=>'nullable|string|max:250',
            'meta_description'=>'nullable|string|max:250',

         //   'image'=>'nullable|image|max:16892|mimes:jpg,jpeg,png',
            'image'=>'nullable'
        ];
    }
}
