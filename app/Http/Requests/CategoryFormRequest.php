<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:250',
            //'slug'=>'required|nullable|string|min:3|max:250',
            'description'=>'required|string|max:250',
            'meta_title'=>'required|string|max:250',
            'meta_keyword'=>'required|string|max:250',
            'meta_description'=>'required|string|max:250',

            'image'=>'image|max:3072|mimes:jpg,jpeg,png',
/*            'name'=>['required','string','max:50'],
            'slug'=>['required','string','max:50'],
            'description'=>['required','max:255'],
            'image'=>['file','size:8192','mimes:jpg,bmp,png'],

            'meta_title'=>['required','string','max:50'],
            'meta_keyword'=>['required','string','max:50'],
            'meta_description'=>['required','string','max:50'],*/
        ];
    }
}
