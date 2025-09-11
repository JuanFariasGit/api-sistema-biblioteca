<?php

namespace App\Services;

use App\Models\Publisher;
use Illuminate\Pagination\LengthAwarePaginator;

class PublisherService extends Service
{
    public function __construct(private Publisher $publisher)
    {
        parent::__construct($publisher);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->publisher::authApiUser()
            ->with(['books'])
            ->paginate($perPage);
    }
} 
