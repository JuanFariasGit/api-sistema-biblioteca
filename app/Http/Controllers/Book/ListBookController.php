<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

class ListBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResource
    {
        $data = Book::with('images')->where('user_id', auth()->id())->paginate();

        return BookResource::collection($data);
    }
}
