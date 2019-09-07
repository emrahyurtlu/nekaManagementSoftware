<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|unique:brands|max:255',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Marka adı alanı zorunludur.',
            'name.unique' => 'Bu marka sistemde kayıtlıdır.',
            'image.required' => 'Logo alanı zorunludur.',
            'image.image' => 'Lütfen bir resim dosyası yükleyiniz.',
        ];
    }

}
