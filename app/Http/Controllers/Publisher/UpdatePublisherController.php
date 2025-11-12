<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Routing\Controllers\Middleware;

class UpdatePublisherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdatePublisherRequest $request, Publisher $publisher): PublisherResource
    {
        $validated = $request->validated();

        $publisher->update($validated);

        return new PublisherResource($publisher->fresh());
    }
}
