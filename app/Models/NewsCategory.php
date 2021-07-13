<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Screen\AsSource;

class NewsCategory extends Model
{
    use AsSource;
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
