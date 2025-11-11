<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Resources\Json\JsonResource;

class ListLendingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResource
    {
        $data = Lending::with(['book', 'reader'])
            ->where('user_id', auth()->id())
            ->paginate();

        return LendingResource::collection($data);
    }
}
