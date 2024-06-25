<?php

namespace App\Models;

use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'alt_tag',
        'image',
        'category_id',
    ];

    public function gallerycategory(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}
