<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductaddRequest extends FormRequest
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
            'name'=>'required|max:100|alpha_spaces|unique:products,name',
            'description'=>'required|max:300',
            'price'=>'required|numeric|maxlength:10',
            'photo'=>'required|max:10240|image|mimes:jpeg,png,gif'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'The Name field is required.',
            'name.max'=>'The name may not be greater than 100 characters.',
            'name.alpha_spaces'=>'Name can contain only Alphabetic characters.',
            'description.required'=>'The Description field is required.',
            'price.numeric'=>'The price must be a number.',
            'price.maxlength'=>'Maximum 10 characters',
            'photo.required'=>'The photo field is required.',
            'photo.image'=>'Uploaded file is not a valid image',
            'photo.size'=>'Max size 1Mb'
        ];
    }

}
