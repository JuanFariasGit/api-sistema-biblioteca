<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLendingRequest;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;

class StoreLendingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreLendingRequest $request): ReaderResource
    {
        $validated = $request->validated();

        $data = Reader::create($validated);

        return new ReaderResource($data);
    }
}
