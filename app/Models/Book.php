<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $with = ['author', 'category'];
    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }
    public function category(): BelongsTo {
        return $this->belongsTo(BookCategory::class);
    }
    public function ratings(): HasMany {
        return $this->hasMany(Rating::class);
    }
}
