<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
     public function __construct(private BookService $bookService)
    {
    }

    public function index()
    {
        $data = $this->bookService->all();

        return BookResource::collection($data);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        $data = $this->bookService->create($validated);

        return new BookResource($data);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        return $this->bookService->update($book, $validated);
    }

    public function destroy(Book $book)
    {
        return $this->bookService->delete($book);
    }
}
