<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class StoreBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreBookRequest $request): BookResource
    {
        $validated = $request->validated();

        $data = Book::create($validated);

        return new BookResource($data);
    }
}
