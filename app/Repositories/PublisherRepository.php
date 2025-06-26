<?php

namespace App\Repositories;

use App\Models\Publisher;

class PublisherRepository extends Repository
{
    protected function model(): Publisher
    {   
        return app(Publisher::class);
    }
} 
