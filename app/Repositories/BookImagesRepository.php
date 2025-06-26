<?php

namespace App\Repositories;

use App\Models\BookImages;

class BookImagesRepository extends Repository
{
    protected function model(): BookImages
    {   
        return app(BookImages::class);
    }
} 
