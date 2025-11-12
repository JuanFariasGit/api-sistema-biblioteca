<?php

namespace App\Http\Controllers\BookImages;

use App\Http\Controllers\Controller;
use App\Models\BookImages;
use Illuminate\Routing\Controllers\Middleware;

class DestroyBookImagesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BookImages $bookImages): void
    {
        $bookImages->delete();
    }
}
