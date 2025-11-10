<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Models\Lending;
use Illuminate\Routing\Controllers\Middleware;

class DestroyLendingController extends Controller
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
    public function __invoke(Lending $lending)
    {
        $lending->delete();
    }
}
