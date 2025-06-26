<?php

namespace App\Repositories;

use App\Models\Lending;

class LendingRepository extends Repository
{
    protected function model(): Lending
    {
        return app(Lending::class);
    }
}
