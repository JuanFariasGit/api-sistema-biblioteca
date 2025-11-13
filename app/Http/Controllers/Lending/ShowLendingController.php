<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Resources\LendingResource;
use App\Models\Lending;

class ShowLendingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Lending $lending): LendingResource
    {
        return new LendingResource($lending);
    }
}
