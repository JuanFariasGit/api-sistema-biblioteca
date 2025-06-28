<?php

namespace App\Http\Requests;

use App\Rules\isOnLoan;
use Illuminate\Foundation\Http\FormRequest;

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
            'lending_date' => 'required|date',
            'due_date' => 'required|date',
            'reader_id' => 'required|uuid|exists:readers,id',
            'book_id' => ['required', 'uuid', 'exists:books,id', new isOnLoan(
                $this->lending_date, 
                $this->due_date,
                $this->lending->id
            )]
        ];
    }
}
