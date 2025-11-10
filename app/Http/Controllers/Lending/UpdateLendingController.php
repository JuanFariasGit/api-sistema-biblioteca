<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLendingRequest;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class UpdateLendingController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,lending')
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateLendingRequest $request, Lending $lending)
    {
        $validated = $request->validated();

        $lending->update($validated);

        return new LendingResource($lending->fresh());
    }
}
