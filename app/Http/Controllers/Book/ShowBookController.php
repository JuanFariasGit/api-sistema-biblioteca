<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Routing\Controllers\Middleware;

class ShowBookController extends Controller
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
    public function __invoke(Book $book)
    {
        return new BookResource($book);
    }
}
