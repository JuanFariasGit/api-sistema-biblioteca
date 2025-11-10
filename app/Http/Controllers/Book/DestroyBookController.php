<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Routing\Controllers\Middleware;

class DestroyBookController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,book')
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book): void
    {
        $book->delete();
    }
}
