<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Publisher;

class DestroyPublisherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Publisher $publisher): void
    {
        $publisher->delete();
    }
}
