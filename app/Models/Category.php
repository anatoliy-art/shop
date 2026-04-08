<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
            'parent_id',
            'title',
            'description',
            'thumbnail',
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

    public static function getTree(): array
    {
        $data = self::all()->toArray();

        $indexedItems = [];
        foreach ($data as $item) {
            $indexedItems[$item['id']] = $item;
            $indexedItems[$item['id']]['children'] = []; // Инициализируем детей
        }

        // 2. Строим дерево
        $tree = [];
        foreach ($indexedItems as $id => &$item) {
            if (empty($item['parent_id'])) {
                $tree[] = &$item; // Корневой элемент
            } else {
                // Добавляем текущий элемент в детей родителя
                $indexedItems[$item['parent_id']]['children'][] = &$item;
            }
        }
        return $tree;
    }

    // 1. Получить того, кто является "родителем" (к кому привязан текущий)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // 2. Получить того, кто привязан к текущему (ребенок)
    public function child(): HasOne
    {
        return $this->hasOne(Category::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
