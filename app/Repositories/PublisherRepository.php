<?php

namespace App\Repositories;

use App\Models\Publisher;
use Illuminate\Pagination\LengthAwarePaginator;

class PublisherRepository extends Repository
{
    protected function model(): Publisher
    {   
        return app(Publisher::class);
    }

     public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model()::with(
            [
                    'books'
                ])->paginate($perPage);
    }
} 
