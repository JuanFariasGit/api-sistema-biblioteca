<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReaderRequest;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;
use Illuminate\Routing\Controllers\Middleware;

class UpdateReaderController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,reader')
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateReaderRequest $request, Reader $reader): ReaderResource
    {
        $validated = $request->validated();

        $reader->update($validated);

        return new ReaderResource($reader->fresh());
    }
}
