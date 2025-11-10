<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReaderResource;
use App\Models\Reader;
use Illuminate\Http\Resources\Json\JsonResource;

class ListReaderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResource
    {
        $data = Reader::where('user_id', auth()->id())->paginate();

        return ReaderResource::collection($data);
    }
}
