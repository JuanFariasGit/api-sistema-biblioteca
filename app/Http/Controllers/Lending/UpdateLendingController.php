<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLendingRequest;
use App\Http\Resources\LendingResource;
use App\Models\Lending;

class UpdateLendingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateLendingRequest $request, Lending $lending): LendingResource
    {
        $validated = $request->validated();

        $lending->update($validated);

        return new LendingResource($lending->fresh());
    }
}
