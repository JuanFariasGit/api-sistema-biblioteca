<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;

class ShowPublisherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Publisher $publisher): PublisherResource
    {
         return new PublisherResource($publisher);
    }
}
