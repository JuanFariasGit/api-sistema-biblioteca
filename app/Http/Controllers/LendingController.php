<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLendingRequest;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use App\Repositories\LendingRepository;

class LendingController extends Controller
{
     public function __construct(private LendingRepository $lendingRepository)
    {
    }

    public function store(StoreLendingRequest $request)
    {
        $validated = $request->validated();
       
        $data = $this->lendingRepository->create($validated);
    
        return new LendingResource($data);
    }

    public function destroy(Lending $lending)
    {
        return $this->lendingRepository->delete($lending);
    }
}
