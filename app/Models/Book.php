<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, HasUuids, SoftDeletes; 

    protected $guarded = []; 

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(BookImages::class);
    }

    public function readers(): BelongsToMany
    {
        return $this->belongsToMany(Reader::class, 'lendings')->withPivot('lending_date', 'due_date');
    }
}
