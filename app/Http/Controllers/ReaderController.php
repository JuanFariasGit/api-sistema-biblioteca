<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;
use App\Repositories\ReaderRepository;
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

     public function __construct(private ReaderRepository $readerRepository)
    {
    }

    public function index()
    {
        $data = $this->readerRepository->paginate();

        return ReaderResource::collection($data);
    }

    public function show(Reader $reader)
    {
        return new ReaderResource($reader);
    }

    public function store(StoreReaderRequest $request)
    {
        $validated = $request->validated();

        $data = $this->readerRepository->create($validated);

        return new ReaderResource($data);
    }

    public function update(UpdateReaderRequest $request, Reader $reader)
    {
        $validated = $request->validated();

        return $this->readerRepository->update($reader, $validated);
    }

    public function destroy(Reader $reader)
    {
        return $this->readerRepository->delete($reader);
    }
}
