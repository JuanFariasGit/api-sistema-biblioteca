<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository extends Repository
{
    protected function model(): Book
    {   
        return app(Book::class);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model()::with(
            [
                    'publisher', 
                    'images', 
                    'readers'
                ])->paginate($perPage);
    }
} 
