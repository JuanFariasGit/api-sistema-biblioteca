<?php

namespace App\Services;

use App\Models\Reader;
use Illuminate\Pagination\LengthAwarePaginator;

class ReaderService extends Service
{
    public function __construct(private Reader $reader)
    {
        parent::__construct($reader);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->reader::authApiUser()
            ->paginate($perPage);
    }
} 
