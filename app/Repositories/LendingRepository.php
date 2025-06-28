<?php

namespace App\Repositories;

use App\Models\Lending;
use Illuminate\Pagination\LengthAwarePaginator;

class LendingRepository extends Repository
{
    protected function model(): Lending
    {
        return app(Lending::class);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model()::with(
            [
                    'book',
                    'reader'
                ])->paginate($perPage);
    }
}
