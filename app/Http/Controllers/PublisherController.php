<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use App\Repositories\PublisherRepository;

class PublisherController extends Controller
{
    public function __construct(private PublisherRepository $publisherRepository)
    {
    }

    public function index()
    {
        $data = $this->publisherRepository->all();

        return PublisherResource::collection($data);
    }

    public function show(Publisher $publisher)
    {
        return new PublisherResource($publisher);
    }

    public function store(StorePublisherRequest $request)
    {
        $validated = $request->validated();

        $data = $this->publisherRepository->create($validated);

        return new PublisherResource($data);
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $validated = $request->validated();

        return $this->publisherRepository->update($publisher, $validated);
    }

    public function destroy(Publisher $publisher)
    {
        return $this->publisherRepository->delete($publisher);
    }
}
