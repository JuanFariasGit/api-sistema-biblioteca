<?php

namespace App\Repositories;

use App\Models\Reader;
use Illuminate\Pagination\LengthAwarePaginator;

class ReaderRepository extends Repository
{
    protected function model(): Reader
    {   
        return app(Reader::class);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model()::where('user_id', auth('api')->id())->with(
            [
                    'books'
                ])->paginate($perPage);
    }
} 
