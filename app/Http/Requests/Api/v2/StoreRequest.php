<?php

namespace App\Http\Requests\Api\v2;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'unique:posts,title'],
            'content' => ['required', 'string'],
            'image' => ['required', 'string'],
            'category' => ['required', 'array'],
            'category.id' => ['integer', 'exists:categories,id'],
            'category.title' => ['string', 'unique:categories,title', 'max:40', 'min:3'],
            'tags' => ['required', 'array'],
            'tags.*.id' => ['integer', 'exists:tags,id'],
            'tags.*.title' => ['string', 'unique:tags,title', 'max:40', 'min:3'],
        ];
    }
}
