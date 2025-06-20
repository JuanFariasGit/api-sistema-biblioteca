<?php

namespace App\Services;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Collection;

class PublisherService extends Service
{
    protected function model(): Publisher
    {   
        return app(Publisher::class);
    }

    public function all(): Collection
    {
        return $this->model()::all();
    }
} 
