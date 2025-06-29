<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,book', except: ['index', 'store'])
        ];
    }

     public function __construct(private BookRepository $bookRepository)
    {
    }

    public function index()
    {
        $data = $this->bookRepository->paginate();

        return BookResource::collection($data);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        $data = $this->bookRepository->create($validated);

        return new BookResource($data);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        return $this->bookRepository->update($book, $validated);
    }

    public function destroy(Book $book)
    {
        return $this->bookRepository->delete($book);
    }
}
