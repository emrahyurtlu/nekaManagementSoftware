<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AliasRequest extends FormRequest
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
            'name' => 'required|unique:aliases|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Alias adı alanı zorunludur.',
            'name.unique' => 'Bu alias sistemde kayıtlıdır.'
        ];
    }
}
