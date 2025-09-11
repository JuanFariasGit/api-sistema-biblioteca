<?php

namespace App\Services;

use App\Models\BookImages;

class BookImagesService extends Service
{
    public function __construct(private BookImages $bookImages)
    {
        parent::__construct($bookImages);
    } 
} 
