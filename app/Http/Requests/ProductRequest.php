<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'nullable|numeric|decimal:0,2',
            'old_price' => 'nullable|numeric|decimal:0,2',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array|min:1|max:4',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
            'hit' => 'nullable|boolean',
            'new' => 'nullable|boolean',
            'sale' => 'nullable|boolean',
        ];
    }
}