<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,JPEG,PNG|max:2028',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'category_name' => 'required',
        ];
    }
}
