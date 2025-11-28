<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "subtitle" => $this->subtitle,
            "author" => $this->author,
            "publisher" => [ 
               "id" => $this->publisher->id,
               "name" => $this->publisher->name 
            ],
            "images" => $this->images->map(function ($image): array {
                return [
                    "id" => $image->id,
                    'image' => Storage::url("books_images/$image->image")
                ];
            })
        ];
    }
}
