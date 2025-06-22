<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use App\Services\PublisherService;

class PublisherController extends Controller
{
    public function __construct(private PublisherService $publisherService)
    {
    }

    public function index()
    {
        $data = $this->publisherService->all();

        return PublisherResource::collection($data);
    }

    public function show(Publisher $publisher)
    {
        return new PublisherResource($publisher);
    }

    public function store(StorePublisherRequest $request)
    {
        $validated = $request->validated();

        $data = $this->publisherService->create($validated);

        return new PublisherResource($data);
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $validated = $request->validated();

        return $this->publisherService->update($publisher, $validated);
    }

    public function destroy(Publisher $publisher)
    {
        return $this->publisherService->delete($publisher);
    }
}
