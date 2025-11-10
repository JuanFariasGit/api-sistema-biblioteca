<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Routing\Controllers\Middleware;

class ShowPublisherController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('can:own,publisher')
        ];
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Publisher $publisher): PublisherResource
    {
         return new PublisherResource($publisher);
    }
}
