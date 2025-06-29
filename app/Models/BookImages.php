<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BookImages extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function Book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public static function booted()
    {
        static::creating(function($model) {;
            $name = uniqid() . '_' . str_replace(' ', '_', strtolower($model->image->getClientOriginalName()));
            
            $model->image->storeAs(
                'books_images', 
                $name, 
                'public'
            );

            $model->image = $name;
        });

        static::deleting(function($model) {
            Storage::disk('public')->delete('books_images/' . $model->image);
        });
    }
}
