<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Routing\Controllers\Middleware;

class ShowBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book)
    {
        return new BookResource($book);
    }
}
