<?php

namespace App\Services;

use App\Models\Lending;
use Illuminate\Pagination\LengthAwarePaginator;

class LendingService extends Service
{
    public function __construct(private Lending $lending)
    {
        parent::__construct($lending);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->lending::authApiUser()
            ->orderByDesc('id')
            ->paginate($perPage);
    }
}
