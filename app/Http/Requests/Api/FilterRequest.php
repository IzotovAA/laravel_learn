<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'string | nullable',
            'content' => 'string | nullable',
            'category_id' => 'nullable | integer | exists:categories,id',
            'page' => 'integer | nullable',
            'per_page' => 'integer | nullable',
        ];
    }
}
