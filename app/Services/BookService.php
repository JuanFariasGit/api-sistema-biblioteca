<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService extends Service
{
    protected function model(): Book
    {   
        return app(Book::class);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model()::with(['publisher'])->paginate(5);
    }
} 
