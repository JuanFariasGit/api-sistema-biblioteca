<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DestroyBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book): void
    {
        $book->delete();
    }
}
