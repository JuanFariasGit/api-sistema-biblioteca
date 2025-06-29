<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'publisher_id' => 'required|ulid|exists:publishers,id',
            'title' => 'required|string|min:4|max:255',
            'subtitle' => 'required|string|min:4|max:255',
            'author' => 'required|string|min:4|max:100',
            'publication_year' => 'required|integer',
            'edition' => 'required|string|min:4|max:255',
        ];
    }
}
