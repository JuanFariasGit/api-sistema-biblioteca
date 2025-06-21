<?php

namespace App\Services;

use App\Models\BookImages;
use Illuminate\Database\Eloquent\Collection;

class BookImagesService extends Service
{
    protected function model(): BookImages
    {   
        return app(BookImages::class);
    }
} 
