<?php

namespace App\Http\Controllers\BookImages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookImagesRequest;
use App\Http\Resources\BookImagesResource;
use App\Models\BookImages;

class StoreBookImagesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreBookImagesRequest $request): BookImagesResource
    {
        $validated = $request->validated();
       
        $data = BookImages::create($validated);
    
        return new BookImagesResource($data);
    }
}
