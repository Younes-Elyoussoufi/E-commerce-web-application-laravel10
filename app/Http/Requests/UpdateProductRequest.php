<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png,JPEG|max:2028',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'category_name' => 'required',
        ];
    }
}
