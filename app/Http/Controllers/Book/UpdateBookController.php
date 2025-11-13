<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class UpdateBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateBookRequest $request, Book $book): BookResource
    {
        $validated = $request->validated();

        $book->update($validated);

        return new BookResource($book->fresh());
    }
}
