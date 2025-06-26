<?php

namespace App\Repositories;

use App\Models\Reader;

class ReaderRepository extends Repository
{
    protected function model(): Reader
    {   
        return app(Reader::class);
    }
} 
