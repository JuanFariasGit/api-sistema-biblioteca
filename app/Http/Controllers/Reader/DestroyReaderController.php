<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Models\Reader;

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
