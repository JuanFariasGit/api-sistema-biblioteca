<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;
use App\Services\ReaderService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ReaderController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,reader', except: ['index', 'store'])
        ];
    }

     public function __construct(private ReaderService $readerService)
    {
    }

    public function index()
    {
        $data = $this->readerService->paginate();

        return ReaderResource::collection($data);
    }

    public function show(Reader $reader)
    {
        return new ReaderResource($reader);
    }

    public function store(StoreReaderRequest $request)
    {
        $validated = $request->validated();

        $data = $this->readerService->create($validated);

        return new ReaderResource($data);
    }

    public function update(UpdateReaderRequest $request, Reader $reader)
    {
        $validated = $request->validated();

        return $this->readerService->update($reader, $validated);
    }

    public function destroy(Reader $reader)
    {
        return $this->readerService->delete($reader);
    }
}
