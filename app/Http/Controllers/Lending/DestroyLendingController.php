<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Models\Lending;

class DestroyLendingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Lending $lending)
    {
        $lending->delete();
    }
}
