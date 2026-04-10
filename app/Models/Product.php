<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
            'category_id',
            'title',
            'description',
            'price',
            'old_price',
            'thumbnail',
            'gallery',
            'stars',
            'view',
            'colors',
            'sizes',
            'hit',
            'new',
            'sale',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $slug = Str::slug($model->title);
            $originalSlug = $slug;
            $count = 1;

            // Проверка на уникальность
            while ($model::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-" . $count++;
            }

            $model->slug = $slug;
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected $casts = [
        'gallery' => 'array',
        'colors' => 'array',
        'sizes' => 'array',
        'hit' => 'boolean',
        'new' => 'boolean',
        'sale' => 'boolean',
    ];

}
