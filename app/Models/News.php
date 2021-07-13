<?php

namespace App\Models;

use App\Events\NewsEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * Class News
 * @package App\Models
 *
 * @property bool $active
 * @property $show_date
 * @property string $slug
 * @property string $title
 * @property string $body
 */
class News extends Model
{
    use AsSource;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'active', 'body', 'show_date', 'preview_image', 'image'
    ];

    protected $allowedSorts = [
        'title',
        'slug',
        'active',
        'category_id',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id', 'id');
    }

    public function previewImage(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'preview_image')->withDefault();
    }

    public function image(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }
}
