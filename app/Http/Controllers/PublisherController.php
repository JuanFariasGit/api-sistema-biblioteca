<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
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

    public function show(string $id)
    {
        $data = $this->publisherService->findById($id);

        if ($data) {
            return new PublisherResource($data);
        }

        abort(404, 'Not found');
    }

    public function store(StorePublisherRequest $request)
    {
        $validated = $request->validated();

        $data = $this->publisherService->create($validated);

        return new PublisherResource($data);
    }

    public function update(UpdatePublisherRequest $request, string $id)
    {
        $validated = $request->validated();

        if ($publisher = $this->publisherService->findById($id)) {
            return $this->publisherService->update($publisher, $validated);
        }

        abort(404, 'Not Found');
    }

    public function destroy(string $id)
    {
        if ($publisher = $this->publisherService->findById($id)) {
            return $this->publisherService->delete($publisher);
        }

        abort(404, 'Not Found');
    }
}
