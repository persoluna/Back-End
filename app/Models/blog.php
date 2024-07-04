<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'blog_title',
        'blog_slug',
        'short_description',
        'long_description',
        'blog_image',
        'alt_tag',
        'banner_image',
        'banner_alt_tag',
        'posted_by',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_canonical',
        'status',
        'user_visits',
        'meta_tags',
    ];

    public function blogcategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
