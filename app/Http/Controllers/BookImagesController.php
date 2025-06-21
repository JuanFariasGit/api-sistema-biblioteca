<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookImagesRequest;
use App\Http\Resources\BookImagesResource;
use App\Services\BookImagesService;
use App\Services\BookService;

class BookImagesController extends Controller
{
     public function __construct(
        private BookImagesService $bookImagesService,
        private BookService $bookService
    )
    {
    }

    public function store(StoreBookImagesRequest $request)
    {
        $validated = $request->validated();

        if ($this->bookService->findById($validated['book_id'])) {
            $data = $this->bookService->create($validated);
    
            return new BookImagesResource($data);
        }

        abort(404, 'Not found');
    }

    public function destroy(string $id)
    {
        if ($book = $this->bookImagesService->findById($id)) {
            return $this->bookImagesService->delete($book);
        }

        abort(404, 'Not Found');
    }
}
