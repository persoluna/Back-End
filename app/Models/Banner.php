<?php

namespace App\Models;

use App\Models\BannerCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'sub_title',
        'description',
        'banner_image',
        'alt_tag',
        'status',
        'position',
    ];

    public function bannercategory(): BelongsTo
    {
        return $this->belongsTo(BannerCategory::class, 'category_id');
    }
}
