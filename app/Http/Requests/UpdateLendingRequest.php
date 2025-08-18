<?php

namespace App\Http\Requests;

use App\Rules\IsOnLoan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLendingRequest extends FormRequest
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
            'lending_date' =>  ['required', Rule::date()->format('Y-m-d')],
            'due_date' =>  ['required', Rule::date()->format('Y-m-d')],
            'reader_id' => 'required|ulid|exists:readers,id',
            'book_id' => ['required', 'ulid', 'exists:books,id', new IsOnLoan(
                $this->lending_date,
                $this->due_date,
                $this->lending->id
            )]
        ];
    }
}
