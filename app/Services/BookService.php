<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService extends Service
{
   public function __construct(private Book $book)
   {
        parent::__construct($book);
   }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->book::authApiUser()
            ->with(['publisher', 'images', 'readers'])
            ->paginate($perPage);
    }
} 
