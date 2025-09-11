<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLendingRequest;
use App\Http\Requests\UpdateLendingRequest;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use App\Services\LendingService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LendingController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,lending', except: ['index', 'store'])
        ];
    }

     public function __construct(private LendingService $lendingService)
    {
    }

    public function index()
    {
        return LendingResource::collection($this->lendingService->paginate());
    }

    public function show(Lending $lending)
    {
        return new LendingResource($lending);
    }

    public function store(StoreLendingRequest $request)
    {
        $validated = $request->validated();
       
        $data = $this->lendingService->create($validated);
    
        return new LendingResource($data);
    }

    public function update(UpdateLendingRequest $request, Lending $lending)
    {
        $validated = $request->validated();

        return $this->lendingService->update($lending, $validated);
    }

    public function destroy(Lending $lending)
    {
        return $this->lendingService->delete($lending);
    }
}
