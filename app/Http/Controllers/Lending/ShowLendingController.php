<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class ShowLendingController extends Controller
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
    public function __invoke(Lending $lending): LendingResource
    {
        return new LendingResource($lending);
    }
}
