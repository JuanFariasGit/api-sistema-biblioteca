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

    public function findById(string $id): ?Book
    {
        return $this->model()::find($id);
    }

    public function create(array $data)
    {
        return $this->model()::create($data);
    }

    public function update(Book $Book, $data)
    {
        return $Book->update($data);
    }

    public function delete(Book $Book)
    {
        return $Book->delete();
    }
} 
