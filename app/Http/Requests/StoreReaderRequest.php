<?php

namespace App\Http\Requests;

use App\Rules\CPF;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReaderRequest extends FormRequest
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
            'cpf' => ['required', Rule::unique('readers')
                                    ->whereNull('deleted_at'), 
                                    new CPF
                                ],
            'full_name' => 'required|min:4|max:255',
            'birthday' => ['required', Rule::date()->format('Y-m-d')],
            'cellphone' => 'required|min:11|max:11',
            'zip_code' => 'required|min:9|max:9',
            'street' => 'required|max:255',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => ['required', Rule::in([
                'AC', 
                'AL', 
                'AP', 
                'AM', 
                'BA', 
                'CE', 
                'DF', 
                'ES', 
                'GO', 
                'MA', 
                'MT', 
                'MS', 
                'MG', 
                'PA', 
                'PB', 
                'PR', 
                'PE', 
                'PI', 
                'RJ', 
                'RN', 
                'RS', 
                'RO', 
                'RR', 
                'SC', 
                'SP', 
                'SE', 
                'TO'
            ])],
            'number' => 'required',
        ];
    }
}
