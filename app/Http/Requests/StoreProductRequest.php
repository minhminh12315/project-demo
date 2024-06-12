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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:category,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'variant_name.*' => 'required|string',
            'value.*.*' => 'required|string',
            'quantity.*' => 'required|integer|min:0',
            'price.*' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'description.required' => 'The product description is required.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'images.*.image' => 'Each image must be a valid image file.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'Each image may not be greater than 2048 kilobytes.',
            'variant_name.*.required' => 'The variant name is required.',
            'value.*.*.required' => 'The value is required.',
            'quantity.*.required' => 'The quantity is required.',
            'quantity.*.integer' => 'The quantity must be an integer.',
            'quantity.*.min' => 'The quantity must be at least 0.',
            'price.*.required' => 'The price is required.',
            'price.*.numeric' => 'The price must be a number.',
            'price.*.min' => 'The price must be at least 0.'
        ];
    }
}
