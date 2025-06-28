<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLendingRequest;
use App\Http\Requests\UpdateLendingRequest;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use App\Repositories\LendingRepository;

class LendingController extends Controller
{
     public function __construct(private LendingRepository $lendingRepository)
    {
    }

    public function index()
    {
        return LendingResource::collection($this->lendingRepository->paginate());
    }

    public function show(Lending $lending)
    {
        return new LendingResource($lending);
    }

    public function store(StoreLendingRequest $request)
    {
        $validated = $request->validated();
       
        $data = $this->lendingRepository->create($validated);
    
        return new LendingResource($data);
    }

    public function update(UpdateLendingRequest $request, Lending $lending)
    {
        $validated = $request->validated();

        return $this->lendingRepository->update($lending, $validated);
    }

    public function destroy(Lending $lending)
    {
        return $this->lendingRepository->delete($lending);
    }
}
