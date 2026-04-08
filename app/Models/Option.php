<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
            'parent_id',
            'title',
            'value',
    ];

    // 1. Получить того, кто является "родителем" (к кому привязан текущий)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Option::class, 'parent_id');
    }

    // 2. Получить того, кто привязан к текущему (ребенок)
    public function child(): HasOne
    {
        return $this->hasOne(Option::class, 'parent_id');
    }
    
}
