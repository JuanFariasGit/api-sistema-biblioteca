<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Resources\Json\JsonResource;

class StorePublisherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StorePublisherRequest $request): PublisherResource
    {
        $validated = $request->validated();

        $data = Publisher::create($validated);

        return new PublisherResource($data);
    }
}
