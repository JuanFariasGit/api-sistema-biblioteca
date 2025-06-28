<?php

namespace App\Rules;

use App\Models\Lending;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class isOnLoan implements ValidationRule
{

    public function __construct(
        private string $lending_date,
        private string $due_date, 
        private ?int $id = null
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
        $query =  Lending::where('book_id', $value)
                    ->where('lending_date', '<=', date('Y-m-d', strtotime($this->lending_date)))
                    ->where('due_date', '>=', date('Y-m-d', strtotime($this->due_date)));

        if ($this->id) {
            $query = $query->where('id', '<>', $this->id);
        }
       
        if ($query->first()) {
            $fail('O livro se encontra emprestado no momento.');
        }
    }
}
