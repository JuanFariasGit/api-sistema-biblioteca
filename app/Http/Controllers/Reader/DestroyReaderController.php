<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use Illuminate\Routing\Controllers\Middleware;

class DestroyReaderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Reader $reader): void
    {
        $reader->delete();
    }
}
