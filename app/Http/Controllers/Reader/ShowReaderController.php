<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;

class ShowReaderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Reader $reader): ReaderResource
    {
        return new ReaderResource($reader);
    }
}
