<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookImagesRequest;
use App\Http\Resources\BookImagesResource;
use App\Services\BookImagesService;
use App\Services\BookService;

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

    public function destroy(string $id)
    {
        if ($book = $this->bookImagesService->findById($id)) {
            return $this->bookImagesService->delete($book);
        }

        abort(404, 'Not Found');
    }
}
