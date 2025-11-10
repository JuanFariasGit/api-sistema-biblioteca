<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;
use Illuminate\Routing\Controllers\Middleware;

class ShowReaderController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,reader')
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Reader $reader): ReaderResource
    {
        return new ReaderResource($reader);
    }
}
