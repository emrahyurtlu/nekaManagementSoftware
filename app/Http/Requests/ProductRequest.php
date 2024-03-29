<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'image' => 'required|image',
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'mass_unit_id' => 'required',
            'mass' => 'required',
            'barcode' => 'required|min:12|max:15',
            'package_barcode' => 'required|min:12|max:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ürün adı alanı zorunludur.',
            'image.required' => 'Fotoğraf alanı zorunludur.',
            'image.image' => 'Lütfen bir resim dosyası yükleyiniz.',
            'brand_id.required' => 'Marka alanı zorunludur.',
            'category_id.required' => 'Kategori alanı zorunludur.',
            'sub_category_id.required' => 'Alt kategori alanı zorunludur.',
            'mass_unit_id.required' => 'Ağırlık birimi alanı zorunludur.',
            'mass.required' => 'Ağırlık alanı zorunludur.',
            'barcode.required' => 'Barkod alanı zorunludur.',
            'barcode.min' => 'Barkod uzunluğu 12 karakterden az olamaz.',
            'barcode.max' => 'Barkod uzunluğu 15 karakterden fazla olamaz.',
            'package_barcode.required' => 'Kutu/Koli barkod alanı zorunludur.',
            'package_barcode.min' => 'Kutu/Koli barkod uzunluğu 12 karakterden az olamaz.',
            'package_barcode.max' => 'Kutu/Koli barkod uzunluğu 15 karakterden fazla olamaz.',
        ];
    }
}
