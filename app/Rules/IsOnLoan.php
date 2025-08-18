<?php

namespace App\Rules;

use App\Models\Lending;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsOnLoan implements ValidationRule
{

    public function __construct(
        private ?string $lending_date = null,
        private ?string $due_date = null,
        private ?string $id = null
    )
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->lending_date > $this->due_date) {
            $fail('A data de emprestimo deve ser menor que a data de entrega.');
            return;
        }

        $query =  Lending::where('book_id', $value)
                    ->where('lending_date', '<=', $this->lending_date)
                    ->where('due_date', '>=', $this->due_date);

        if ($this->id) {
            $query = $query->where('id', '<>', $this->id);
        }

        if ($query->first()) {
            $fail('O livro se encontra emprestado no momento.');
        }
    }
}
