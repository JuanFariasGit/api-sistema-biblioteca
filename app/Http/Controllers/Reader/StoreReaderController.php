<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReaderRequest;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;

class StoreReaderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreReaderRequest $request): ReaderResource
    {
        $validated = $request->validated();

        $data = Reader::create($validated);

        return new ReaderResource($data);
    }
}
