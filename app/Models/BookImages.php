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
        static::creating(function($model) {
            $model->image = $model->image->store('books_images');
            
            $model->user_id = auth('api')->id();
        });

        static::forceDeleting(function($model) {
            Storage::disk('public')->delete($model->image);
        });
    }
}
