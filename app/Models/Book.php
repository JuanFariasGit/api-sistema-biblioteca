<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(BookImages::class);
    }

    public function readings(): BelongsToMany
    {
        return $this->belongsToMany(Reader::class, 'lendings')
            ->whereNull('lendings.deleted_at')
            ->withPivot('lending_date', 'due_date');
    }

    public static function booted()
    {
        static::creating(function($model) {
            $model->user_id = auth('api')->id();
        });
    }
}
