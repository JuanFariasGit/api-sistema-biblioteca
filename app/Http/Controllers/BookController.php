<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
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

    public function show(string $id)
    {
        $data = $this->bookService->findById($id);

        if ($data) {
            return new BookResource($data);
        }

        abort(404, 'Not found');
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        $data = $this->bookService->create($validated);

        return new BookResource($data);
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        $validated = $request->validated();

        if ($book = $this->bookService->findById($id)) {
            return $this->bookService->update($book, $validated);
        }

        abort(404, 'Not Found');
    }

    public function destroy(string $id)
    {
        if ($book = $this->bookService->findById($id)) {
            return $this->bookService->delete($book);
        }

        abort(404, 'Not Found');
    }
}
