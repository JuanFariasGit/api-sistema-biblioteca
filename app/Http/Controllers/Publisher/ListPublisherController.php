<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Resources\Json\JsonResource;

class ListPublisherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResource
    {
        $data = Publisher::where('user_id', auth()->id())->paginate();

        return PublisherResource::collection($data);
    }
}
