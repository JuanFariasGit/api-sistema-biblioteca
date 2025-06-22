<?php

namespace App\Services;

use App\Models\Reader;
use Illuminate\Pagination\LengthAwarePaginator;

class ReaderService extends Service
{
    protected function model(): Reader
    {   
        return app(Reader::class);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model()::paginate(5);
    }
} 
