<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookImagesRequest;
use App\Http\Resources\BookImagesResource;
use App\Models\BookImages;
use App\Services\BookImagesService;

class BookImagesController extends Controller
{
     public function __construct(private BookImagesService $bookImagesService)
    {
    }

    public function store(StoreBookImagesRequest $request)
    {
        $validated = $request->validated();
       
        $data = $this->bookImagesService->create($validated);
    
        return new BookImagesResource($data);
    }

    public function destroy(BookImages $book_image)
    {
        return $this->bookImagesService->delete($book_image);
    }
}
